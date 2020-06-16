FROM php:7.3.10-fpm

RUN apt-get update && apt-get install -y libicu-dev

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN apt-get clean

RUN pecl install apcu
RUN docker-php-ext-enable apcu
RUN docker-php-ext-install intl opcache

WORKDIR /usr/share/nginx/html

RUN apt-get install zip -y
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer