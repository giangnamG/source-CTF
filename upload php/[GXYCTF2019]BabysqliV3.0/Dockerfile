FROM php:5.6.40-zts-alpine


WORKDIR /var/www/html

RUN rm -rf /var/www/html/*

COPY ./src/ /var/www/html/
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./flag /flag
RUN mkdir /var/www/html/uploads/ && \
    chmod -R 755 /var/www/html/ && \
    chmod -R 777 /var/www/html/uploads/ && \
    chown -R root:root /var/www/html 

RUN apk update && apk add --no-cache shadow \
    && usermod -u 82 www-data

USER www-data

CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]

# docker build -t rce_me .
# docker run -d -p 8899:80 --name rce_me rce_me
