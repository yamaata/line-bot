#!/bin/bash

# Apache
echo "ServerName $HOSTNAME" >> /etc/httpd/conf/httpd.conf

# Composer
cd /var/www/html
if [ -f ./composer.json ]; then
    if [ ! -f ./composer.lock ]; then
        curl -sS https://getcomposer.org/installer | php \
        && php ./composer.phar install
    else
        php ./composer.phar update
    fi
fi

exec "$@"