FROM php:7.4-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite
# Fix for .htaccess / 404 pages
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf
COPY ./Website/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80
CMD ["bash", "-lc", "set -eux; a2dismod mpm_event mpm_worker || true; rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* || true; a2enmod mpm_prefork; exec apache2-foreground"]
