# Projeto de Cadastro de Fornecedores com Laravel 10

Este é um projeto desenvolvido com Laravel 10 para a gestão de fornecedores. Ele inclui as funcionalidades de criação, leitura, atualização e exclusão (CRUD) de fornecedores, bem como validações e seeders para preencher o banco de dados com dados de exemplo. O Docker Sail é usado para simplificar o ambiente de desenvolvimento.

## Requisitos

Antes de começar a usar este projeto, certifique-se de ter as seguintes dependências instaladas em sua máquina:

- PHP 8.0 ou superior
- Composer
- Docker
- Docker Compose

## Configuração

Siga estas etapas para configurar o projeto em sua máquina:

1. Clone este repositório para o seu ambiente de desenvolvimento:

   ```bash
   git clone https://github.com/leabru29/cadastro-fornecedores.git
2. Acesse o diretório do projeto:

   ```bash
   cd cadastro-fornecedores
3. Copie o arquivo .env.example para .env e configure o banco:

   ```bash
   cp .env.example .env
4. Inicialize o ambiente Sail e inicie os contêineres Docker:

   ```bash
   ./vendor/bin/sail up
5. Rode o Npm :

   ```bash
   ./vendor/bin/sail npm install && npm run dev
6. Rode as migrations e os Seeders com:
    ```bash
    ./vendor/bin/sail artisan migrate:fresh --seed
7. Acesse o Login com:
    ```bash
    admin@admin.com
8. A senha coloque:
    ```bash
    123123123
