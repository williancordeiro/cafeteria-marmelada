FROM mysql:8.0.42-debian
ENV TZ="Ameria/Sao_Paulo"
ENV MYSQL_ROOT_PASSWORD=password

COPY ./database/marmelada.sql /docker-entrypoint-initdb.d/marmelada.sql