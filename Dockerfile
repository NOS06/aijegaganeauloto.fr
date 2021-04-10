FROM php:8.0-apache-buster

ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 80
WORKDIR /app

RUN apt-get update -qq && \
    apt-get install -qy \
    git \
    gnupg \
    unzip \
    libpq-dev \
    libzip-dev \
    libxslt-dev \
    zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# PHP Extensions
RUN docker-php-ext-install -j$(nproc) opcache pdo_pgsql zip xsl 
COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini

# Apache
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/apache.conf /etc/apache2/conf-available/z-app.conf
COPY . /app

RUN a2enmod rewrite remoteip && \
    a2enconf z-app

ENV APP_ENV=prod \
    APP_DEBUG=0 \
    DATABASE_URL="postgresql://main:main@database:5432/main?serverVersion=12&charset=utf8"

RUN mkdir -p var && \
    composer install --prefer-dist --no-interaction --no-ansi --no-autoloader --no-scripts --no-progress --no-suggest && \
    composer clear-cache && \
    composer dump-autoload --optimize --classmap-authoritative && \
    bin/console cache:clear --no-warmup && \
    bin/console cache:warmup && \
    bin/console assets:install && \
    chmod -R 777 var
