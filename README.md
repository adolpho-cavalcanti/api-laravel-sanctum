## Setup Projeto
OBS: Dentro da pasta public do projeto tem uma pasta tutorial com um arquivo PDF explicando sobre o porjeto.


-   1- Clone o Projeto e digite o comando docker-compose up
-   2- Acesse http:localhost:8080 e veja se está o Laravel já está no ar
-   3- Abra uma nova aba no terminal e na raiz do projeto acesse o bash do php que está no Docker com o seguinte comando:
	    - docker-compose exec dev bash
-   4- E dentro do bash do PHP digite o comando para instalar o sanctum(Responsável pela autenticação na API): composer require laravel/sanctum
-   5- Ainda dentro do bash do PHP rode as migrations e seeders:
        - php artisan migrate:fresh --seed

Pronto! Vc já pode usar a Api.

## Endpoints

As rotas sempre terá essa estrutura "api/dashboard/"quando o usuário estiver logado.
E api/ na rota de Login.

Só será possível cadastrar Empresas e participantes se o Usuário ADMIN estiver logado e com o token de autenticação que você receberá apoś efetuar o login.

O Usuário ADMIN tem os seguintes dados:
    Email: adolpho@terra.com.br
    Senha: docker@1212

-   Route post: '/login'

Route group: 'prefix' => 'dashboard',

-   Route get: '/companies'
-   Route post: '/companies'
-   Route get: '/company/{id}'
-   Route put: '/company/{id}'
-   Route delete: '/company/{id}'
    
-   Route get: '/participants'
-   Route post: '/participants'
-   Route get: '/participant/{id}'
-   Route put: '/participant/{id}'
-   Route delete: '/participant/{id}'