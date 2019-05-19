#!/usr/bin/env bash

sudo apt-get -y update
sudo apt-get -y upgrade
sudo apt-get -y autoremove

sudo usermod -a -G www-data ubuntu
sudo usermod -a -G www-data vagrant
sudo usermod -a -G ubuntu www-data
sudo usermod -a -G vagrant www-data

sudo chmod -R 0777 /usr/local/bin

sudo LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 7F0CEB10
sudo apt-get -y update

sudo apt-get install -y software-properties-common python-software-properties systemd
sudo apt-get install -y git zip unzip snmp
sudo apt-get install -y redis-server redis-tools
sudo apt-get install -y nginx

sudo apt-get install -y \
    php7.2 \
    php7.2-dev \
    php7.2-fpm \
    php7.2-cli \
    php7.2-bcmath \
    php7.2-common \
    php7.2-json \
    php7.2-opcache \
    php7.2-mysql \
    php7.2-phpdbg \
    php7.2-mbstring \
    php7.2-gd \
    php7.2-imap \
    php7.2-ldap \
    php7.2-pgsql \
    php7.2-pspell \
    php7.2-recode \
    php7.2-snmp \
    php7.2-tidy \
    php7.2-dev \
    php7.2-intl \
    php7.2-curl \
    php7.2-zip \
    php7.2-xml \
    php7.2-xmlrpc \
    php7.2-soap \
    php7.2-xdebug \
    php7.2-enchant \
    php7.2-gmp \
    php7.2-sybase \
    php7.2-dba \
    php7.2-readline \
    php7.2-xsl \
    php7.2-bz2 \
    php7.2-odbc \
    php7.2-sqlite3

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo cp composer.phar /usr/bin/composer
rm composer.phar
