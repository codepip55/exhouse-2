FROM php:8.3.14-cli-bookworm

WORKDIR /var/www/html

RUN apt-get update

RUN curl -sS https://getcomposer.org/installer | php -- --version=2.8.3 --install-dir=/usr/local/bin --filename=composer

COPY . .

USER 1000

RUN composer install

CMD ["php","artisan","serve","--host=0.0.0.0"]
