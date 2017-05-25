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
