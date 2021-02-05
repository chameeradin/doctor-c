#!/usr/bin/env bash

IGNORE=/var/tmp/ignore

echo "
.env
.git*
/vendor/*
node_modules/*
" > $IGNORE

# update
rsync . uguest@192.168.1.183:/home/uguest/erv-decision-tree --exclude-from=$IGNORE --delete -rvczh

#initial deploy with all files
#rsync . uguest@192.168.1.183:/home/uguest/golfins/ --delete -rvczh


rm $IGNORE