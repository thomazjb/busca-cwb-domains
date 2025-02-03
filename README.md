# Aplicação de Gerenciamento de Domínios com Laravel 11 e Blade 

A aplicação tem como utilidade a validação de conhecimentos técnicos para a vaga de Desenvolvedor Full Stack na empresa "Busca Curitiba".
Feito por Thomaz Juliann Boncompagni.

## Avisos importantes

- A aplicação foi desenvolvida utilizando sail, ambiente de dockerização do laravel, é necessário ter o docker instalado na máquina para rodar o ambiente corretamente.
- É importante que você possua node e npm instalados na maquina virtual para facilitar o gerenciamento da aplicação, caso precise buildar o front externamente.
- Caso haja algum bug ou erro no build me contate através de thomaz.jb@hotmail.com

## Tecnologias Utilizadas

- **Laravel 11**: Framework PHP poderoso e elegante para o desenvolvimento de aplicativos web.
- **Breeze**: Biblioteca de gerenciamento de autenticação de usuários.
- **Blade**: Engine de desenvolvimento de templates para Laravel.
- **Vite**: Ferramenta de gerenciamento de servidores front-end. Otima ferramenta para compilação rápida quando uma mudança é feita na página.
- **Inertia.js**: Biblioteca que permite o gerenciamento de monolitos, agilizando a recuperação e gerenciamento de dados entre Back e Front.
- **Sail**: Conjunto de scripts Docker para Laravel que facilita o gerenciamento para desenvolvimento local.
- **MySQL 8**: Sistema de gerenciamento de banco de dados de código aberto.
- **PHPMyAdmin**: Ferramenta de administração e desenvolvimento de banco de dados SQL.

## Funcionalidades

- **CRUD de Domínios**: Os usuários autenticados têm a possibilidade de cadastrar um novo domínio, bem como gerenciar aqueles já cadastrados.
- **Painel de Login**: Acesso restrito apenas para usuários autenticados.

## Como Executar Localmente

1. Clone este repositório:

   ```
   git clone https://github.com/thomazjb/busca-cwwb-domains.git
   ```

2. entre no repositório:

   ```
   cd busca-cwwb-domains
   ```

3. Faça o build da aplicação:

   ```
   ./vendor/bin/sail build --no-cache
   ```

4. Levante o conteiner da aplicação:

   ```
   ./vendor/bin/sail up -d
   ```


5. Instale as dependências PHP com o Composer:

   ```
   ./vendor/bin/sail composer install
   ```

6. Copie o arquivo de ambiente de exemplo:

   ```
   cp .env.example .env
   ```
   
7. Execute as migrações do banco de dados para criar as tabelas necessárias:

   ```
   ./vendor/bin/sail artisan migrate
   ```
   
8. Execute as migrações do banco de dados para criar as tabelas necessárias:

   ```
   ./vendor/bin/sail npm run dev
   ```


## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
