FROM mysql:8.0.42-debian
ENV TZ="Ameria/Sao_Paulo"
ENV MYSQL_ALLOW_EMPTY_PASSWORD=True
COPY ./database/marmelada.sql /docker-entrypoint-initdb.d/marmelada.sql