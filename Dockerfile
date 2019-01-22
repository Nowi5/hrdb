# Dockerfile
# In case you need to update, please build and upload to gitlab via https://gitlab.com/nowi5/test/container_registry
FROM php:7.2-apache

MAINTAINER Simon Ludwigs

# Dockerfile
# In case you need to update, please build and upload to gitlab via https://gitlab.com/nowi5/test/container_registry
# docker login registry.gitlab.com
# docker build -t registry.gitlab.com/nowi5/wlm .
# docker push registry.gitlab.com/nowi5/wlm

# Update packages
RUN apt-get update

# Already installed by image php:7.1.8
# curl

RUN apt-get install -qq git zip unzip wget libmcrypt-dev libjpeg-dev libpng-dev libfreetype6-dev libbz2-dev nano chromium libxml2-dev libmagickwand-dev sendmail libpng-dev zlib1g-dev gnupg2

# Install nodejs, npm - Using Debian, as root
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get install -y nodejs

# Install php debuger / Install xdebug for development
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN pecl install imagick	

#Install other php extensions
RUN docker-php-ext-install sockets \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip \
    && docker-php-ext-install bz2 \
#	&& docker-php-ext-configure mcrypt \
#    && docker-php-ext-install mcrypt \
	&& docker-php-ext-enable imagick \
	&& docker-php-ext-install gd

# Already installed by image php:7.1.8
#    && docker-php-ext-install json \
#    && docker-php-ext-install xml \	
#    && docker-php-ext-install mbstring \
#    && docker-php-ext-install curl	\

# Enable SSL
RUN mkdir /etc/apache2/ssl
COPY ./docker/apache.crt /etc/apache2/ssl
COPY ./docker/apache.key /etc/apache2/ssl

RUN a2enmod rewrite
RUN a2enmod ssl
	
# Clear out the local repository of retrieved package files
RUN apt-get clean
	
COPY . /srv/app
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /srv/app

RUN chown -R www-data:www-data /srv/app

# Install composer
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

#RUN composer global require "laravel/envoy=~1.0"

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="./vendor/bin:$PATH"