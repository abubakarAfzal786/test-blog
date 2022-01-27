FROM php:7.2.17-apache

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    gnupg2 \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && apt-get install -y nodejs && apt-get install -y npm

#RUN mkdir /var/www/app

COPY ./app /var/www/html

#USER root
RUN ls -la /var/www/html
RUN /bin/bash -c 'chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache'
RUN /bin/bash -c 'chown -R www-data:www-data /var/www/html/storage'
RUN ls -la /var/www/html

RUN /bin/sh -c "composer install --no-plugins --no-scripts"
RUN a2enmod rewrite && service apache2 restart

COPY ./docker/apache_php/apache_config.prod.conf /etc/apache2/sites-enabled/000-default.conf

COPY ./docker/apache_php/php.ini /usr/local/etc/php/php.ini

COPY ./docker/apache_php/run.sh /var/www/html/run.sh

# RUN chown www-data:www-data /var/www/html/run.sh



# ENTRYPOINT [ "/var/www/html/run.sh" ] 