#!/bin/bash
set -e

if [ "$#" -ne 2 ]; then
    echo "This will backup database and files"
    echo "Usage: backup.sh [remote url] [remote mysql password]"
    echo "Example: ./backup.sh sysart.live password"
    exit
fi

echo "=== BACKUP ==="

REMOTE_URL=$1
REMOTE_PASS=$2
BACKUPS_DIR='/root/backups'
TIMESTAMP=$(date +%Y-%m-%d-%H-%M-%S)
BACKUP_FILE="$BACKUPS_DIR/$TIMESTAMP.tar.gz"

ssh $REMOTE_URL "
set -e

DIR=\$(mktemp -d)
trap 'rm -rf \$DIR' exit

echo 'Copying files'
cp -R /var/www/html \$DIR

echo 'Dumping database'
mysqldump -uroot --password=$REMOTE_PASS sysart_wp > \$DIR/sysart.sql

echo 'Compressing'
tar -zcf $BACKUP_FILE -C \$DIR .

cd $BACKUPS_DIR
OLD_BACKUPS=\$(ls -t | awk 'NR>5')
if [[ \$OLD_BACKUPS ]]; then
  rm \$OLD_BACKUPS
fi
"

echo "Created backup: $BACKUP_FILE"
