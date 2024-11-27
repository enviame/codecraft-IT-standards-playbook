# Dockerfile for PHP
FROM php:7.4-cli

WORKDIR /app

COPY . /app

RUN curl -sS https://getcomposer.org/installer | php && \
    php composer.phar require phpunit/phpunit --dev && \
    ./vendor/bin/phpunit --version

CMD ["./vendor/bin/phpunit", "--configuration", "phpunit.xml"]
