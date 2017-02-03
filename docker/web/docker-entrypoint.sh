#!/bin/bash

# Apache
echo -e "\nServerName $HOSTNAME" >> /etc/apache2/apache2.conf

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