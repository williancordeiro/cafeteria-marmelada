FROM php:8.3.22-fpm
ENV TZ="America/Sao_Paulo"
RUN apt-get update
RUN apt-get install -y nginx
RUN docker-php-ext-install pdo_mysql
COPY app/ /var/www/cafeteria-marmelada/app/
COPY logs/ /var/www/cafeteria-marmelada/logs/
COPY docker/web/marmelada /etc/nginx/sites-avaliable/marmelada
RUN rm -f /etc/nginx/sites-enabled/default
RUN ln -s /etc/nginx/sites-avaliable/marmelada /etc/nginx/sites-enabled
RUN chown -R www-data:www-data /var/www/cafeteria-marmelada
RUN /etc/init.d/nginx start