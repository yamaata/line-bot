#
# php/7.1 Web Server
#

FROM php:7.1.1-apache
MAINTAINER Yuto Yamada

# apt-get
RUN apt-get update -y \
    && apt-get install -y git unzip zlib1g ssl-cert --no-install-recommends \
    && rm -r /var/lib/apt/lists/*

# ssl activate
RUN ln -s /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-enabled/default-ssl.conf \
    && rm /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod ssl

# xdebug
ENV xdebug /usr/local/etc/php/conf.d/xdebug.ini
RUN pecl install xdebug \
    && echo "[Xdebug]\n" > $xdebug \
    && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so\n" >> $xdebug \
    && echo "xdebug.idekey = \"PHPSTORM\"\n" >> $xdebug \
    && echo "xdebug.default_enable = 0\n" >> $xdebug \
    && echo "xdebug.remote_enable = 1\n" >> $xdebug \
    && echo "xdebug.remote_autostart = 0\n" >> $xdebug \
    && echo "xdebug.remote_connect_back = 0\n" >> $xdebug \
    && echo "xdebug.profiler_enable = 0\n" >> $xdebug \
    && echo "xdebug.remote_host = 10.254.254.254\n" >> $xdebug

# execute after run
COPY ./docker-entrypoint.sh /usr/local/bin/
RUN chmod 755 /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]