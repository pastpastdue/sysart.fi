#!/bin/bash
set -e

REPO_DIR="/root/sysart"
TARGET_DIR="/var/www/html"

if [ "$#" -ne 1 ]; then
    echo "This script will pull the latest git master to live server and run npm scripts for styles"
    echo "Usage: deploy_live.sh [remote url]"
    exit
fi

REMOTE_URL=$1

echo "--- Pulling newest changes & running scripts ---"
ssh $1 "
cd $REPO_DIR && \
git pull && \
git clean -fdx -e node_modules && \
npm install && \
npm run build && \
rsync -a -v --delete $REPO_DIR/wp/wp-content/themes/sysart $TARGET_DIR/wp-content/themes && \
rsync -a -v --delete $REPO_DIR/wp/wp-content/plugins/* $TARGET_DIR/wp-content/plugins
"

echo "--- DONE! ---"
