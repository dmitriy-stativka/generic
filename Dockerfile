FROM registry.digitalocean.com/dslk/php/wordpress:latest

WORKDIR /var/www

COPY --chown=www-data:www-data wp-content /var/www/wp-content

VOLUME ["/var/www/wp-content/uploads"]
