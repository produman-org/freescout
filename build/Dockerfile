FROM cr.yandex/crp8juv6c6l7grkdm6il/php-nginx:8.3.14
USER root
RUN docker-php-ext-install mysqli pdo_mysql pcntl
COPY ./build/nginx.conf /etc/nginx/nginx.conf
USER 1000
COPY ./ /app
COPY ./build/composer.phar /app
USER root
RUN chown -R 1000:1000 /app
USER 1000
RUN rm -rf /app/vendor /app/.env.example /app/.env.travis
RUN php composer.phar install --ignore-platform-reqs
ARG APP_URL
RUN php artisan freescout:build && \
    php artisan cache:clear && \
    php artisan config:clear && \
    php artisan storage:link
RUN touch /app/.env
EXPOSE 80
