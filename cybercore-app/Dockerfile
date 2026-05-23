# Usamos una imagen oficial de PHP con Apache optimizada para producción
FROM php:8.2-apache

# Instalamos extensiones de PHP necesarias para Laravel y librerías del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Limpiamos caché del gestor de paquetes
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalamos extensiones de PHP comunes (puedes agregar pdo_mysql si usas MySQL)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Activamos el módulo de reescritura de Apache (crucial para las rutas de Laravel)
RUN a2enmod rewrite

# Cambiamos la raíz de Apache para que apunte a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Instalamos Composer de forma global
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiamos todo el código de nuestro proyecto al contenedor
COPY . /var/www/html

# Instalamos las dependencias de producción de Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Asignamos permisos correctos a las carpetas de almacenamiento de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exponemos el puerto 80 estándar de Apache
EXPOSE 80

CMD ["apache2-foreground"]