FROM richarvey/nginx-php-fpm:3.1.6

COPY . .
RUN apk update

CMD ["/start.sh"]