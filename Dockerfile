FROM php:8.3-apache

# Instalando dependências do sistema para extensões PHP e git
RUN apt-get update && apt-get install -y \
        git \
        libicu-dev \
        libzip-dev \
        unzip \
        default-mysql-client \
    && docker-php-ext-install \
        intl \
        opcache \
        pdo_mysql \
        zip

# Habilitar o mod_rewrite do Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar o diretório de trabalho
WORKDIR /var/www

# Aqrquivo de configuração do apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Copiar os arquivos do Composer
COPY composer.json composer.lock ./

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_NO_INTERACTION=1

# Instalar as dependências do projeto sem as dependências de desenvolvimento
RUN composer install --prefer-dist --no-scripts --no-dev --no-autoloader && rm -rf /root/.composer

# Copiar o código da aplicação
COPY . .

# Ajustar permissões do diretório
RUN chown -R www-data:www-data /var/www

# Copiar o script de entrada e torná-lo executável
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Dump autoload
RUN composer dump-autoload --no-scripts --no-dev

# Usar o script de entrada como ENTRYPOINT
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
