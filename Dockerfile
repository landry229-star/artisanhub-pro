```dockerfile
# ==========================================
# 1. BUILD FRONTEND ASSETS (VITE)
# ==========================================
FROM node:22-alpine AS assets

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build


# ==========================================
# 2. INSTALL PHP DEPENDENCIES (COMPOSER)
# ==========================================
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts


# ==========================================
# 3. PHP + APACHE + LARAVEL
# ==========================================
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libicu-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install \
        bcmath \
        exif \
        gd \
        intl \
        opcache \
        pcntl \
        pdo_mysql \
        pdo_pgsql \
        zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*


# ==========================================
# 4. APACHE CONFIGURATION
# ==========================================
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf


# ==========================================
# 5. COPY LARAVEL APPLICATION
# ==========================================
WORKDIR /var/www/html

COPY . .

COPY --from=vendor /app/vendor ./vendor

COPY --from=assets /app/public/build ./public/build


# ==========================================
# 6. LARAVEL CONFIGURATION
# ==========================================
RUN mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rw storage bootstrap/cache


# ==========================================
# 7. DOCKER ENTRYPOINT
# ==========================================
COPY deploy/docker-entrypoint.sh /usr/local/bin/artisanhub-entrypoint

RUN chmod +x /usr/local/bin/artisanhub-entrypoint


# ==========================================
# 8. START APACHE
# ==========================================
EXPOSE 80

ENTRYPOINT ["artisanhub-entrypoint"]

CMD ["apache2-foreground"]
```
