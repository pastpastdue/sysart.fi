#!/bin/bash
set -e

if [ "$#" -ne 4 ]; then
    echo "This script will replace your local wp-database and uploads with the live ones"
    echo "Usage: get_data.sh [remote url] [remote mysql password] [url that replaces http://sysart.fi from the database] [get uploads yes/no]"
    echo "Example:"
    echo "./get_data.sh sysart.live kissakala http://localhost:8080 yes"
    exit
fi

REMOTE_URL=$1
REMOTE_PASS=$2
REPLACE_URL=$3
UPLOADS=$4
MYSQL_CONTAINER=$(docker-compose ps -q mysql)
WORDPRESS_CONTAINER=$(docker-compose ps -q wordpress)

echo "--- Dumping database ---"
ssh $REMOTE_URL "mysqldump -uroot --password=$REMOTE_PASS --databases sysart_wp | gzip > sysart.sql.gz"

echo "--- Downloading database dump ---"
scp $REMOTE_URL:sysart.sql.gz .

ssh $REMOTE_URL "rm ~/sysart.sql.gz"

echo "--- Decompressing dump ---"
gunzip sysart.sql.gz

echo "--- Importing database dump ---"
docker exec $MYSQL_CONTAINER mysql -proot -e 'drop database if exists sysart_wp; create database sysart_wp;'
docker exec -i $MYSQL_CONTAINER mysql -proot sysart_wp < sysart.sql
rm sysart.sql

if [ "$UPLOADS" == "yes" ]
then
  echo "--- Importing uploads ---"

  ssh $REMOTE_URL "
    rm -rf ~/uploads
    cp -r /var/www/html/wp-content/uploads ~/uploads
    tar -zcf uploads.tar.gz uploads
    rm -rf ~/uploads
  "

  scp $REMOTE_URL:uploads.tar.gz .

  ssh $REMOTE_URL "
    rm ~/uploads.tar.gz
  "

  rm -rf wp/wp-content/uploads
  tar -zxf uploads.tar.gz -C wp/wp-content
  rm uploads.tar.gz
fi

echo "--- Running search and replace ---"
docker exec $WORDPRESS_CONTAINER php /srdb/srdb.cli.php -h mysql -n sysart_wp -u root -p root -s http://sysart.fi -r $REPLACE_URL

echo "--- DONE! ---"
