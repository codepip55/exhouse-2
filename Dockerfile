FROM php:8.3.14-cli-bookworm

WORKDIR /var/www/html

RUN apt-get update

RUN curl -sS https://getcomposer.org/installer | php -- --version=1.10.26 --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install

CMD ["php","artisan","serve","--host=0.0.0.0"]
