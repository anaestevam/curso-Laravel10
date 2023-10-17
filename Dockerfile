FROM php:8.1.9-fpm-alpine AS builder

RUN apk update
RUN apk add --no-cache $PHPIZE_DEPS \
    linux-headers \
    bash \
    shadow \
    libpng \
    zlib-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    libxml2-dev \
    mariadb-connector-c \
    mariadb-client \
    && docker-php-ext-install \
    gd \
    mysqli \
    pdo_mysql \
    soap \
    bcmath \
    zip \
    && apk del \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    zlib-dev \
    libxpm-dev \
    libxml2-dev

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN pecl install excimer \
    && docker-php-ext-enable excimer

RUN touch /home/www-data/.bashrc | echo "PS1='\w\$ '" >> /home/www-data/.bashrc

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -L -o /tmp/apm-agent-php_1.9.1_all.apk https://github.com/elastic/apm-agent-php/releases/download/v1.9.1/apm-agent-php_1.9.1_all.apk
RUN apk add --allow-untrusted /tmp/apm-agent-php_1.9.1_all.apk
RUN rm -rf /tmp/apm-agent-php_1.9.1_all.apk

COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini
# COPY docker/php/elastic.ini /usr/local/etc/php/conf.d/elastic.ini

WORKDIR /var/www

FROM builder

WORKDIR /var/www

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www
USER www-data


EXPOSE 9000
CMD [ "php-fpm" ]