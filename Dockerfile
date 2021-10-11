FROM php:7.4-fpm

RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
RUN usermod -g 1000 www-data

# Install server dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libxml2-dev

RUN docker-php-ext-install opcache soap

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime

COPY ./docker/php/perf.ini /usr/local/etc/php/conf.d/perf.ini

COPY . /www

WORKDIR /www

# composer dev
#RUN composer install ${COMPOSER_OPTION} --optimize-autoloader --no-interaction
#RUN composer dump-autoload ${COMPOSER_OPTION} --classmap-authoritative

# cache
#RUN php bin/console cache:clear

# droits d'écriture (cache & logs)
RUN chmod 777 -R  app/var
