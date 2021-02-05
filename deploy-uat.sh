#!/usr/bin/env bash

IGNORE=/var/tmp/ignore

echo "
.env
.git*
/vendor/*
node_modules/*
" > $IGNORE

# update
rsync . appuser@34.240.148.15:/var/www/html/52.208.226.9 --exclude-from=$IGNORE --delete -rvczh

#initial deploy with all files
#rsync . uguest@192.168.1.183:/home/uguest/golfins/ --delete -rvczh


rm $IGNORE