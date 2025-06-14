FROM php:8.3.22-fpm
ENV TZ="America/Sao_Paulo"
COPY app/ /var/www/cafeteria-marmelada/app/
COPY logs/ /var/www/cafeteria-marmelada/logs/
COPY docker/script/init.sh /home/init.sh
COPY docker/web/marmelada /etc/nginx/sites-avaliable/marmelada
RUN chmod +x /home/init.sh 
RUN sh /home/init.sh