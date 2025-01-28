FROM node:20 as frontend-builder

WORKDIR /app

COPY package.json package-lock.json ./

RUN npm install

COPY . .

RUN npm run build

FROM php:8.2-fpm as backend-builder

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    lipzip-dev \
    libpng-dev \
    libonig-dev \
    libxm2-dev \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd \
    && docker-php-ext-enable pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

COPY --from=frontend-builder /app/public public

RUN composer isntall --optimize-autoloader --no-dev

RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
