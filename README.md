<p align="center"><img src="https://site.drugovich.com.br/_nuxt/img/dragao_rodape.42dfbbe.png" width="400"></a></p>

## Sobre o Projeto

Este projeto é uma API de clientes para fins de testes da Drugovich

## Cenário

Em nossa auto peças surgiu a demanda que nossos gerentes pudessem separar nossos clientes em grupos distintos. Nossos gerentes têm dois níveis.

## Requisitos

- Um cliente deve pertencer a apenas um grupo;
- Gerentes precisam estar autenticados;
- Gerentes de nível um pode apenas visualizar grupos, adicionar/remover clientes;
- Gerentes de nível dois são os únicos que podem criar, editar e excluir grupos;

### Tecnologias Usadas

- **[PHP 8](https://www.php.net/)**
- **[Laravel 9](https://laravel.com/)**
- **[SQLite](https://www.sqlite.org/index.html)**
- **[jwt-auth](https://github.com/tymondesigns/jwt-auth)**

## Modelagem de dados

- Clients: id, cnpj, name, foundation_date, group_id, created_at, updated_at;
- Managers: id, name, email, level, password, created_at, updated_at;
- Groups: id, name, created_at, updated_at;

![drugovich](https://user-images.githubusercontent.com/31490923/164322529-e135b3cd-e823-460f-981f-fbfaf4d4c1ea.png)

## Iniciando o Projeto

 1. Clone esse repositório na sua máquina local
 2. Acesse a pasta api-drugovich
 3. Dê um **$ composer install**
 4. Execute o servidor:  **$ php artisan serve**
 5. O banco de dados está sendo enviado via arquivo por se tratar do SQLite (escolhido para este projeto justamente por ser mais simples e o projeto não exigir muito),     as tabelas clients e managers já estão preenchidas

## Rotas

**Clients**
- GET /clients - Lista todos os clientes
- GET /clients/{id} - Lista um cliente
- POST /clients/{id}/updateClientGroup - Atualiza grupo do cliente (Requer autenticação)
```python
##REQUISIÇÃO
{
 "group_id": "1",
}
```
**Managers**
- GET /managers - Lista todos os gerentes
- GET /managers/{id} - Lista um Gerente

**Login**
- POST /login - Autentica gerente (Retorna Bearer token)
Exemplo de requisição json:
```python
##REQUISIÇÃO
{
 "email": "example@example.com",
 "password": "123456"
}

##RESPOSTA
{
   "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwNDI3NzQ3LCJleHAiOjE2NTA0MzEzNDcsIm5iZiI6MTY1MDQyNzc0NywianRpIjoibmxLbHc2WGVrSWNaNHJhbSIsInN1YiI6IjEiLCJwcnYiOiI2ZTY4OTYyMjU0ZDZkZjQwMWQwM2IzMGEzOWUxNjIzNjRlMTY0NmNkIn0.IwZGoBcx3HA-xa2qzbdhLlQHbUbQJgbI6b2He5uVCjw",
   "token_type": "bearer",
   "expires_in": 3600
}
```

**Groups(Requer autenticação Bearer Token)**
- GET /groups - Lista todos os grupos
- GET /groups/{id} - Lista um grupo com seus participantes
- POST /groups - Cria grupo
```python
##REQUISIÇÃO
{
 "name": "grupo teste",
}
```
- PUT /groups/{id} - Atualiza grupo
```python
##REQUISIÇÃO
{
 "name": "grupo teste",
}
```
- DELETE /groups/{id} - Deleta grupo

