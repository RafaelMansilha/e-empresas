#!/bin/sh

# Instala as dependências do projeto
composer install --prefer-dist --no-interaction

# Espera até que o MariaDB esteja pronto
while ! mysqladmin ping -h"mariadb" --silent; do
    sleep 1
done

# Executa as migrações
php bin/console doctrine:migrations:migrate --no-interaction

# Continua com o comando padrão do Dockerfile
exec "$@"

# Inicia o servidor web Apache
exec apache2-foreground