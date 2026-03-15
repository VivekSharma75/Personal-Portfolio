# ── Build stage ──────────────────────────────────────────────────────────────
FROM php:8.2-apache

# Install PHP extensions needed for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (for clean URLs)
RUN a2enmod rewrite

# Allow .htaccess overrides and disable directory listing
RUN { \
    echo '<Directory /var/www/html>'; \
    echo '    AllowOverride All'; \
    echo '    Options -Indexes +FollowSymLinks'; \
    echo '    Require all granted'; \
    echo '</Directory>'; \
} >> /etc/apache2/apache2.conf

# Copy all project files into the web root
COPY . /var/www/html/

# Remove files that should not be publicly accessible
RUN rm -f /var/www/html/setup.sql \
          /var/www/html/.gitignore \
          /var/www/html/.dockerignore

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type f -exec chmod 644 {} \; \
    && find /var/www/html -type d -exec chmod 755 {} \;

# Copy and register the startup script
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
