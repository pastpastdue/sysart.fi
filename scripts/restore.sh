#!/bin/bash
set -e

if [ "$#" -lt 2 ]; then
    echo "This will restore database and files"
    echo "Usage: restore.sh [remote url] [remote mysql password] [optional: version]"
    echo "Example: ./restore.sh sysart.live password [1]"
    exit
fi

echo "=== RESTORE ==="

REMOTE_URL=$1
MYSQL_PASSWORD=$2
BACKUP_INDEX=${3:-1}

BACKUPS_DIR='/root/backups'
TARGET_DIR='/var/www/html'
DATABASE='sysart_wp'
MYSQL_COMMAND="mysql -uroot -p$MYSQL_PASSWORD"

ssh $REMOTE_URL "
set -e

cd $BACKUPS_DIR

LATEST_BACKUP=\$(ls -t | awk 'NR==$BACKUP_INDEX')
if [ -z "\$LATEST_BACKUP" ]; then
  echo 'Cannot find backup'
  exit
fi

DIR=\$(mktemp -d)
trap 'rm -rf \$DIR' exit

echo 'Unzipping...'
tar xzf \$LATEST_BACKUP -C \$DIR
rm -rf $TARGET_DIR
mv \$DIR/html $TARGET_DIR

echo 'Importing database...'
$MYSQL_COMMAND -e \"DROP DATABASE IF EXISTS $DATABASE; CREATE DATABASE $DATABASE;\"
$MYSQL_COMMAND $DATABASE < \$DIR/sysart.sql

echo 'Restored backup!'
"
