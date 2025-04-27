# Implementações

## Requisitos Funcionais

São as funcionalidades específicas que o sistema deve oferecer para atender às necessidades do usuário e cumprir os objetivos do negócio. Eles definem o que o sistema deve fazer.

## 👨🏽 Usuários:
    - [x] | Deve ser capaz de cadastrar um usuário;
    - [x] | Deve ser capaz de listar todos os usuários;
    - [x] | Deve ser capaz de atualizar um usuário;
    - [  ] | Deve ser capaz de consultar todas as permissões;
    - [  ] | Deve ser capaz de fazer filtragens;
    - [  ] | Deve ser capaz de paginar caso ultrapasse 10 registros;
    - [  ] | Deve ser capaz de permitir que o usuário realize login utilizando seu usuário e senha;
    - [  ] | Deve ser capaz de exibir as informações do perfil do usuário, como nome, email, e a data de cadastro;
    - [  ] | Deve ser capaz de exibir a atribuição de papéis e permissões a um usuário, determinando seus direitos e acessos;
    - [  ] | Deve ser capaz de permitir que o usuário altere sua senha com segurança, validando a senha antiga antes de aceitar a nova;
    - [  ] | Deve ser capaz de oferecer uma funcionalidade para recuperação de senha, através de um link enviado para o email do usuário;

## 🏣 Empresas:
    - [x] | Deve ser capaz de cadastrar uma empresa;
    - [x] | Deve ser capaz de listar todos as empresas;
    - [x] | Deve ser capaz de atualizar uma empresa;
    - [  ] | Deve ser capaz de fazer filtragens;
    - [  ] | Deve ser capaz de paginar caso ultrapasse 10 registros;

## 🔒 Permissões:
    - [x] | Deve ser capaz de cadastrar uma permissão;
    - [x] | Deve ser capaz de listar todos as permissões;
    - [x] | Deve ser capaz de atualizar uma permissão;
    - [  ] | Deve ser capaz de fazer filtragens;
    - [  ] | Deve ser capaz de paginar caso ultrapasse 10 registros;

## 👨🏽‍💼 Perfis:
    - [x] | Deve ser capaz de criar um perfil;
    - [x] | Deve ser capaz de listar todos os perfis;
    - [x] | Deve ser capaz de atualizar um perfil;
    - [x] | Deve ser capaz de atribuir permissões ao perfil criado;

## 🏭 Fornecedores:
    - [  ] | Deve ser capaz de cadastrar um fornecedor;
    - [  ] | Deve ser capaz de listar todos os fornecedores;
    - [  ] | Deve ser capaz de atualizar um fornecedor;
    - [  ] | Deve ser capaz de fazer filtragens;
    - [  ] | Deve ser capaz de paginar caso ultrapasse 10 registros;

## 📦 Produtos:
    - [  ] | Deve ser capaz de cadastrar um produto;
    - [  ] | Deve ser capaz de listar todos produtos;
    - [  ] | Deve ser capaz de atualizar o cadastro de um produto;
    - [  ] | Deve ser capaz de fazer filtragens;
    - [  ] | Deve ser capaz de paginar caso ultrapasse 10 registros;

## 📰 Notas fiscais:
    - [  ] | Deve ser capaz de cadastrar uma nota fiscal e seus produtos;
    - [  ] | Deve ser capaz de listar todas as notas fiscais;
    - [  ] | Deve ser capaz de atualizar uma nota fiscal;
    - [  ] | Deve ser capaz de fazer filtragens;
    - [  ] | Deve ser capaz de paginar caso ultrapasse 10 registros;

## Requisitos Não Funcionais

São as características do sistema que garantem sua qualidade e adequação ao uso, como a performance, segurança, usabilidade, escalabilidade, dentre outras. Eles definem como o sistema deve fazer.

## Geral:
    - [  ] | As informações devem ser armazenadas em banco de dados relacional;
    - [  ] | O sistema deve registrar eventos no log;

## 👨🏽 Usuários:
    - [  ] | A senha do usuário deve ser hashed;

## 🏣 Empresas:
    - [  ] | 

## 🔒 Permissões:
    - [  ] | 

## 👨🏽‍💼 Perfis:
    - [  ] | 

## Regras de Negócio

São as restrições, políticas, procedimentos e diretrizes que regem a operação do negócio. Elas definem as restrições e diretrizes que o sistema deve seguir para atender às necessidades do negócio e dos usuários.

## Geral:
    - [  ] | Um usuário pode ter várias empresas e uma empresa pode ter vários usuários;
    - [  ] | Todos os nomes do sistema devem ser registrados com letras maiúsculas e sem acento;

## 👨🏽 Usuários:
    - [x] | O número do usuário deve ser único, não podendo haver duplicidade na base de dados;
    - [  ] | O sistema deve limitar o número de tentativas de login falhas (ex: 3 tentativas), bloqueando o usuário temporariamente após exceder o limite;

## 🏣 Empresas:
    - [x] | O CNPJ da empresa deve ser único, não podendo haver duplicidade na base de dados;

## 🔒 Permissões:
    - [  ] | 

## 👨🏽‍💼 Perfis:
    - [  ] | 
