#!/bin/bash -e

cd /var/www/html

if [ ! -d "vendor" ]; then
    composer install
fi

apache2-foreground
