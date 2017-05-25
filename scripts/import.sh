#!/bin/bash

set -e

SCRIPT_DIR=$( cd ${0%/*} && pwd -P )
WP_DIR="$SCRIPT_DIR/../wp"
MYSQL_CONTAINER=$(docker-compose ps -q mysql)
WORDPRESS_CONTAINER=$(docker-compose ps -q wordpress)

if [ "$#" -ne 1 ]; then
  echo "pass backup zip as a parameter"
  exit 1
fi

if [ ! -f "$1" ]; then
  echo "file \"$1\" does not exists!"
  exit 1
fi

TEMPDIR=$(mktemp -d)
trap "rm -rf $TEMPDIR" EXIT

echo "--- Decompressing backup ---"
unzip -q -d "$TEMPDIR" $1

echo "--- Importing database ---"
docker exec $MYSQL_CONTAINER mysql -proot -e 'drop database if exists sysart_wp; create database sysart_wp;'
docker exec -i $MYSQL_CONTAINER mysql -proot sysart_wp < $TEMPDIR/wp-content/mysql.sql

echo "--- Importing uploads ---"
rm -rf $WP_DIR/wp-content/uploads
cp -r $TEMPDIR/wp-content/uploads $WP_DIR/wp-content/uploads

echo "--- Add DB haxes ---"
docker exec $MYSQL_CONTAINER mysql -proot sysart_wp -e "
  UPDATE wp_options SET option_value = 'http://localhost:8080' WHERE option_name = 'home' OR option_name = 'siteurl';
  INSERT INTO wp_users (user_login, user_pass, user_nicename, display_name) VALUES ('admin', md5('admin'), 'admin', 'admin');
  SET @user_id = LAST_INSERT_ID();
  INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (@user_id, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}');
  INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (@user_id, 'wp_user_level', '10');
"
