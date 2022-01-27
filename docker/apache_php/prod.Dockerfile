FROM javachakir/laravel-base:latest



COPY ./app /var/www/html

#USER root
RUN ls -la /var/www/html
RUN /bin/bash -c 'chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache'
RUN /bin/bash -c 'chown -R www-data:www-data /var/www/html/storage'
RUN ls -la /var/www/html

RUN a2enmod rewrite && service apache2 restart

COPY ./docker/apache_php/apache_config.prod.conf /etc/apache2/sites-enabled/000-default.conf

COPY ./docker/apache_php/php.ini /usr/local/etc/php/php.ini

COPY ./docker/apache_php/run.sh /var/www/html/run.sh

# RUN chown www-data:www-data /var/www/html/run.sh
WORKDIR /var/www/html/
RUN npm install
RUN npm run prod
ENTRYPOINT [ "/var/www/html/run.sh" ] 