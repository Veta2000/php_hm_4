# Базовый образ для PHP с Apache
FROM php:8.1-apache

# Установить необходимые расширения PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Скопировать содержимое локальной директории в контейнер
COPY ./src /var/www/html/

# Открыть порт 80 для доступа к Apache
EXPOSE 80
