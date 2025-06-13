#!/bin/bash
apt-get update
apt-get install -y nginx
docker-php-ext-install pdo_mysql

rm -f /etc/nginx/sites-enabled/default
ln -s /etc/nginx/sites-avaliable/marmelada /etc/nginx/sites-enabled
chown -R www-data:www-data /var/www/cafeteria-marmelada
/etc/init.d/nginx restart