# Use a imagem oficial do PHP com Apache
FROM php:8.3-apache

# Habilitar módulos necessários do Apache
RUN a2enmod rewrite

# Instalar dependências do Laravel, SOAP, GD, OpenSSL e utilitários
# Instalar dependências do Laravel, SOAP, GD, OpenSSL e utilitários
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libxml2-dev \
    zip \
    unzip \
    mariadb-client \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    openssl \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    mysqli \
    zip \
    soap \
    gd \
    && docker-php-ext-enable soap \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs


# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir a variável de ambiente COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_ALLOW_SUPERUSER=1

# Configurar o servidor Apache
COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar o código da aplicação para o container
COPY . .

# Configurar as permissões de armazenamento
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpar o cache do Composer
RUN composer clear-cache
# Rodar o comando storage:link para criar o link simbólico
RUN php artisan storage:link
# Expor a porta 80
EXPOSE 80

# Comando para iniciar o servidor Apache
CMD ["apache2-foreground"]
