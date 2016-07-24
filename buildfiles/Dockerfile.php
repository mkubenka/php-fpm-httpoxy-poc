FROM php:7.0-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y git zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["./entrypoint.sh"]
