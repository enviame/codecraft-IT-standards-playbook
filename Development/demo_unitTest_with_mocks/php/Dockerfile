FROM php:7.4-cli

WORKDIR /app

COPY . /app

RUN curl -sS https://getcomposer.org/installer | php && \
    php composer.phar require phpunit/phpunit --dev

CMD ["./vendor/bin/phpunit", "--configuration", "phpunit.xml"]
