#!/usr/bin/env bash

php artisan migrate

php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan module:optimize
php artisan optimize
composer dump-autoload