FROM wordpress:latest

RUN yes | pecl install xdebug && \
    docker-php-ext-enable xdebug

ADD config/xdebug.ini /xdebug.ini
RUN cat /xdebug.ini >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
