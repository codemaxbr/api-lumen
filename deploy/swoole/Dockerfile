FROM zaherg/php-swoole:7.2

WORKDIR /var/www

ENV APP_DEBUG ${APP_DEBUG:-true}
ENV SWOOLE_HTTP_PORT ${SWOOLE_HTTP_PORT:-80}
ENV SWOOLE_HTTP_HOST ${SWOOLE_HTTP_HOST:-"0.0.0.0"}

USER root

ADD ./ /var/www

CMD ["php", "artisan", "swoole:http", "start"]