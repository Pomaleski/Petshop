FROM php:8.2-cli

RUN apt-get update
RUN apt-get install -y curl git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql
RUN export COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app
COPY composer.json .
COPY composer.lock .
RUN composer install

COPY . .

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080"]