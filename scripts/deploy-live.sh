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
git add -A
git commit -m 'Add files'
git push --force git@git.wpengine.com:production/sysart201705.git master
