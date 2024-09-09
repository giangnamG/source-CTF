FROM php:8.0-apache
RUN apt-get update && apt-get upgrade -y
COPY src/ /var/www/html/ 
COPY flag.txt /
RUN chmod 444 /flag.txt
RUN mkdir /var/www/html/tmp && chmod 777 /var/www/html/tmp
RUN service apache2 restart
