# e-Empresas

O projeto e-empresas é um sistema para o cadastro de empresas. Esta é a primeira versão do sistema, que inclui autenticação de usuários, criação de usuários e um CRUD (Criar, Ler, Atualizar, Deletar) para o gerenciamento de empresas.

## Recursos

- **Autenticação**: Acesso seguro ao sistema com autenticação de usuários.
- **Gestão de Usuários**: Crie e gerencie usuários dentro do sistema.
- **CRUD de Empresas**: Interface para adicionar, visualizar, editar e excluir informações das empresas.

## Pré-requisitos

Para rodar este projeto, você precisará ter o Docker instalado em sua máquina. Visite [Docker](https://www.docker.com/get-started) para instruções de instalação.

## Como Executar

1. Clone o repositório do projeto para a sua máquina local.

    ```bash
    git clone git@github.com:RafaelMansilha/e-empresas.git
    ```

2. Navegue até o diretório do projeto.

    ```bash
    cd e-empresas
    ```

3. Execute o seguinte comando para construir e iniciar os containers do Docker. Este comando também inicia a aplicação e o banco de dados.

    ```bash
    docker-compose up --build -d
    ```

Após a execução do comando, os containers necessários para a aplicação e-empresas serão iniciados em modo daemon.

## Acessando a Aplicação

Após iniciar a aplicação com o Docker, você pode acessá-la navegando para [http://localhost:8080](http://localhost:8080) no seu navegador.

### Usuário e senha padrão de acesso:

- **email**: admin
- **senha**: admin

## Tecnologias Utilizadas

- **Backend**: Symfony
- **Frontend**: Twig (integrado ao Symfony)
- **Banco de Dados**: MariaDB
- **Infraestrutura**: Docker