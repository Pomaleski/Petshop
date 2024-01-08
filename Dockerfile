FROM php:8.2-cli

RUN apt-get update \
	&& apt-get install -y nodejs npm curl \
	&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

COPY package.json .
RUN npm install

COPY composer.json .
RUN composer install

COPY . .

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080"]