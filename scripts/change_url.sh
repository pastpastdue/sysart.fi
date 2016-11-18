#!/bin/bash
set -e

if [ "$#" -ne 2 ]; then
    exit
fi

FROM=$1
TO=$2
WORDPRESS_CONTAINER=$(docker-compose ps -q wordpress)

echo "--- Running search and replace ---"
docker exec $WORDPRESS_CONTAINER php /srdb/srdb.cli.php -h mysql -n sysart_wp -u root -p root -s $FROM -r $TO

echo "--- DONE! ---"
