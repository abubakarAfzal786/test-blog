FROM php:7.3.11-apache

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    gnupg2 \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
RUN apt-get update -yq \
    && apt-get -yq install curl gnupg ca-certificates \
    && curl -L https://deb.nodesource.com/setup_12.x | bash \
    && apt-get update -yq \
    && apt-get install -yq \
        dh-autoreconf=19 \
        ruby=1:2.5.* \
        ruby-dev=1:2.5.* \
        nodejs
RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



# RUN curl -o- -L https://yarnpkg.com/install.sh | bash

RUN a2enmod rewrite && service apache2 restart

COPY apache_config.conf /etc/apache2/sites-enabled/000-default.conf

COPY php.ini /usr/local/etc/php/php.ini

