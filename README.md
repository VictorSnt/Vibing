
# Desafio Técnico SagaTech

  

Este repositório contém uma aplicação básica de cadastro de músicas construída com a **Tall Stack**. Siga os passos abaixo para clonar o projeto, instalar as dependências, configurar o ambiente e rodar a aplicação.

  

## Passo a passo para rodar a aplicação

  

### 1. Clonar o repositório

Primeiro, clone o repositório do GitHub para o seu ambiente local:

```bash

git  clone  git@github.com:VictorSnt/Vibing.git

cd  Vibing

cp  .env.example  .env

```

### 2. Ajuste o seu arquivo .env

com suas variáveis de ambiente altere o .env

e a imagem docker se necessario

e depois rode os seguintes comandos 

```bash
docker-compose up -d --build

docker-compose exec <your app> bash

composer  install

php  artisan  key:generate

php  artisan  migrate  --seed

npm install

npm  run  dev

```

### Aplicação Pronta

Usuário comum:

- Email: user@user.com

- Senha: user##

Administrador:

- Email: admin@admin.com

- Senha: admin#

Superusuário:

 -Email: superuser@superuser.com

 -Senha: superuser

  

# Conclusão

  
Após seguir os passos acima, sua aplicação de cadastro de músicas deve estar em execução. Você pode acessar a aplicação no seu navegador através do endereço padrão fornecido pelo comando php artisan serve, geralmente http://localhost:8000.