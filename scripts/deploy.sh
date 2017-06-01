#!/bin/bash

set -e

SCRIPT_DIR=$( cd ${0%/*} && pwd -P )
ROOT_DIR="$SCRIPT_DIR/.."
WP_DIR="$ROOT_DIR/wp"

TEMPDIR=$(mktemp -d)
trap "rm -rf $TEMPDIR" EXIT

cd $ROOT_DIR
npm run build

cp -r $WP_DIR $TEMPDIR
cd $TEMPDIR/wp
git init
git config user.name "Sysart"
git config user.email "sysart@sysart.fi"
git add -A
git commit -m 'Add files'
ssh-add $ROOT_DIR/travis
git push --force git@git.wpengine.com:staging/sysart201705.git master
