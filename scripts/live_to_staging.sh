#!/bin/bash
set -e

REMOTE_URL=$1
LIVE_PATH="/var/www/html"
STAGING_PATH="/var/www/html-staging"

ssh $REMOTE_URL "
  rm -rf $STAGING_PATH
  cp -r $LIVE_PATH $STAGING_PATH
"
