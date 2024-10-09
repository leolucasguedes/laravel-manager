<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1 align="center">
  TattooMeLet
</h1>
<div align="center">

  <h3>Built With</h3>

  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" height="30px"/>
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" height="30px"/>
  <img src="https://img.shields.io/badge/Eloquent-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" height="30px"/>
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" height="30px"/>

</div>

<br/>

# Description

API para Gestão de Empresas, Usuários e Clientes
</br>

## Configuração e Instalação

### 1. Pré-requisitos

Certifique-se de que possui:

-   PHP 8.3+ instalado.
-   Composer instalado.
-   Banco de dados configurado (MySQL, SQLite, ou PostgreSQL).

### 2. Rodando o Projeto

Clone este repositório e navegue até a pasta do projeto:

```bash
git clone https://github.com/leolucasguedes/laravel-manager.git
cd manager-app
```

Copie o arquivo .env.example para .env:

```bash
cp .env.example .env
```

Instalando as Dependências

```bash
composer install
```

Gere uma chave de aplicação para o Laravel:

```bash
php artisan key:generate
```

Executando as Migrations

```bash
php artisan migrate
```

### 3. Execução do Projeto

Opção 1: Herd (Recomendado)
Para rodar o projeto com HTTPS, utilize o Herd com o HTTPS ativado. Isso permitirá uma experiência mais próxima de produção, principalmente para requisições autenticadas.

Opção 2: PHP Built-in Server (Alternativa)

```bash
php artisan serve || php -S localhost:8000 -t public
```

### 4. Rotas e Endpoints

#### Autenticação

Todas as rotas estão protegidas por autenticação via token de API (Laravel Jetstream com Sanctum). Cada usuário autenticado pode gerar um token de API para autenticar suas requisições. Use o Admin criado pelo seeder como primeiro usuário autenticado. Use o token gerado como um Bearer Token no cabeçalho de cada requisição: <br />
Authorization: Bearer TOKEN

#### Endpoints da API

Empresas:
<br />
GET /api/empresas - Lista todas as empresas. <br />
POST /api/empresas - Cria uma nova empresa. <br />
GET /api/empresas/{id} - Exibe uma empresa específica. <br />
PUT /api/empresas/{id} - Atualiza uma empresa. <br />
DELETE /api/empresas/{id} - Remove uma empresa.
<br />
Usuários:
<br />
GET /api/usuarios - Lista todos os usuários. <br />
POST /api/usuarios - Cria um novo usuário. <br />
GET /api/usuarios/{id} - Exibe um usuário específico. <br />
PUT /api/usuarios/{id} - Atualiza um usuário. <br />
DELETE /api/usuarios/{id} - Remove um usuário.
<br />
Clientes:
<br />
GET /api/clientes - Lista todos os clientes. <br />
POST /api/clientes - Cria um novo cliente. <br />
GET /api/clientes/{id} - Exibe um cliente específico. <br />
PUT /api/clientes/{id} - Atualiza um cliente.<br />
DELETE /api/clientes/{id} - Remove um cliente.

### 5. API Reference

#

#### POST /api/login

Realiza o login e retorna um token de autenticação para o usuário.

Request Body:

| Body     | Type   | Description                    |
| :------- | :----- | :----------------------------- |
| email    | string | **Required**. Email válido     |
| password | string | **Required**. Senha do usuário |

Response:

{
"token": "token_autenticacao"
}

#

#### POST /api/logout

Realiza o logout do usuário autenticado, invalidando o token de acesso.

Request Headers:

| Headers       | Type   | Description                       |
| :------------ | :----- | :-------------------------------- |
| authorization | string | **Required**. Bearer token válido |

Response:

{
"message": "Logout realizado com sucesso"
}

#

#### POST /api/usuarios

Cria um novo usuário.

Request Body:

| Body         | Type    | Description                        |
| :----------- | :------ | :--------------------------------- |
| usuario_nome | string  | **Required**. Nome do usuário      |
| email        | string  | **Required**. Email válido         |
| password     | string  | **Required**. Senha do usuário     |
| empresa_id   | integer | **Required**. ID da empresa válida |

Response:

{
"id": "user.id",
"usuario_nome": "user.nome",
"email": "user.email",
"empresa_id": "empresa.id"
}

#

#### GET /api/usuarios

Lista todos os usuários da mesma empresa.

Request Headers:

| Headers       | Type   | Description                       |
| :------------ | :----- | :-------------------------------- |
| authorization | string | **Required**. Bearer token válido |

Response:

[
{
"id": 1,
"usuario_nome": "Nome do usuário",
"email": "email@example.com",
"empresa_id": 1
}
]

#

#### GET /api/usuarios/:id

Exibe detalhes de um usuário específico.

Request Headers:

| Headers       | Type   | Description                       |
| :------------ | :----- | :-------------------------------- |
| authorization | string | **Required**. Bearer token válido |

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID do usuário |

Response:

{
"id": 1,
"usuario_nome": "Nome do usuário",
"email": "email@example.com",
"empresa_id": 1
}

#

#### PUT /api/usuarios/:id

Atualiza informações de um usuário específico.

Request Headers:

| Headers       | Type   | Description                       |
| :------------ | :----- | :-------------------------------- |
| authorization | string | **Required**. Bearer token válido |

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID do usuário |

Request Body:

| Body         | Type   | Description                    |
| :----------- | :----- | :----------------------------- |
| usuario_nome | string | **Optional**. Nome do usuário  |
| email        | string | **Optional**. Email do usuário |
| password     | string | **Optional**. Senha do usuário |

Response:

{
"id": 1,
"usuario_nome": "Novo Nome do usuário",
"email": "novoemail@example.com",
"empresa_id": 1
}

#

#### DELETE /api/usuarios/:id

Remove um usuário específico.

Request Headers:

| Headers       | Type   | Description                       |
| :------------ | :----- | :-------------------------------- |
| authorization | string | **Required**. Bearer token válido |

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID do usuário |

Response:

{
"message": "Usuário deletado com sucesso"
}

#

#### POST /api/empresas

Cria uma nova empresa.

Request Body:

| Body         | Type   | Description                   |
| :----------- | :----- | :---------------------------- |
| empresa_nome | string | **Required**. Nome da empresa |

Response:

{
"id": "empresa.id",
"empresa_nome": "Nome da empresa"
}

#

#### GET /api/empresas

Lista todas as empresas.

Response:

[
{
"id": 1,
"empresa_nome": "Nome da empresa"
}
]

#

#### GET /api/empresas/:id

Exibe detalhes de uma empresa específica.

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID da empresa |

Response:

{
"id": 1,
"empresa_nome": "Nome da empresa"
}

#

#### PUT /api/empresas/:id

Atualiza informações de uma empresa específica.

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID da empresa |

Request Body:

| Body         | Type   | Description                   |
| :----------- | :----- | :---------------------------- |
| empresa_nome | string | **Optional**. Nome da empresa |

Response:

{
"id": 1,
"empresa_nome": "Novo Nome da empresa"
}

#

#### DELETE /api/empresas/:id

Remove uma empresa específica.

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID da empresa |

Response:

{
"message": "Empresa deletada com sucesso"
}

#

#### POST /api/clientes

Cria um novo cliente.

Request Body:

| Body         | Type    | Description                   |
| :----------- | :------ | :---------------------------- |
| cliente_nome | string  | **Required**. Nome do cliente |
| usuario_id   | integer | **Required**. ID do usuário   |

Response:

{
"id": "cliente.id",
"cliente_nome": "Nome do cliente",
"usuario_id": "user.id"
}

#

#### GET /api/clientes

Lista todos os clientes da mesma empresa.

Response:

[
{
"id": 1,
"cliente_nome": "Nome do cliente",
"usuario_id": 1
}
]

#

#### GET /api/clientes/:id

Exibe detalhes de um cliente específico.

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID do cliente |

Response:

{
"id": 1,
"cliente_nome": "Nome do cliente",
"usuario_id": 1
}

#

#### PUT /api/clientes/:id

Atualiza informações de um cliente específico.

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID do cliente |

Request Body:

| Body         | Type    | Description                   |
| :----------- | :------ | :---------------------------- |
| cliente_nome | string  | **Optional**. Nome do cliente |
| usuario_id   | integer | **Optional**. ID do usuário   |

Response:

{
"id": 1,
"cliente_nome": "Novo Nome do cliente",
"usuario_id": 1
}

#

#### DELETE /api/clientes/:id

Remove um cliente específico.

Request Params:

| Params | Type    | Description                 |
| :----- | :------ | :-------------------------- |
| id     | integer | **Required**. ID do cliente |

Response:

{
"message": "Cliente deletado com sucesso"
}

## Authors

-   [@leolucasguedes](https://www.github.com/leolucasguedes)

<br/>
