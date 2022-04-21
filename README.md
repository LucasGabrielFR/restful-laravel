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

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
