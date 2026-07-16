FROM php:7.4-apache

# Install legacy MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy website files
COPY ./Website/ /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

# RUNTIME FIX: Forcibly delete conflicting Railway MPM modules and run Apache
CMD ["bash", "-lc", "set -eux; a2dismod mpm_event mpm_worker || true; rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* || true; a2enmod mpm_prefork; exec apache2-foreground"]