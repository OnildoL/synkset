# Implementações

## Requisitos Funcionais

São as funcionalidades específicas que o sistema deve oferecer para atender às necessidades do usuário e cumprir os objetivos do negócio. Eles definem o que o sistema deve fazer.

## 👨🏽 Usuários:
    - [  ] | Deve ser capaz de cadastrar um usuário;
    - [  ] | Deve ser capaz de listar todos os usuários;
    - [  ] | Deve ser capaz de atualizar um usuário;
    - [  ] | Deve ser capaz de fazer filtragens;
    - [  ] | Deve ser capaz de paginar caso ultrapasse 10 registros;
    - [  ] | Deve ser capaz de consultar todas as permissões;
    - [  ] | Deve ser capaz de permitir que o usuário realize login utilizando seu usuário e senha;
    - [  ] | Deve ser capaz de exibir as informações do perfil do usuário, como nome, email, e a data de cadastro;
    - [  ] | Deve ser capaz de exibir a atribuição de papéis e permissões a um usuário, determinando seus direitos e acessos;
    - [  ] | Deve ser capaz de permitir que o usuário altere sua senha com segurança, validando a senha antiga antes de aceitar a nova;
    - [  ] | Deve ser capaz de oferecer uma funcionalidade para recuperação de senha, através de um link enviado para o email do usuário;

## Requisitos Não Funcionais

São as características do sistema que garantem sua qualidade e adequação ao uso, como a performance, segurança, usabilidade, escalabilidade, dentre outras. Eles definem como o sistema deve fazer.

## 👨🏽 Usuários:
    - [  ] | As informações devem ser armazenadas em banco de dados relacional;
    - [  ] | A senha do usuário deve ser hashed;
    - [  ] | O sistema deve registrar eventos no log;

## Regras de Negócio

São as restrições, políticas, procedimentos e diretrizes que regem a operação do negócio. Elas definem as restrições e diretrizes que o sistema deve seguir para atender às necessidades do negócio e dos usuários.

## 👨🏽 Usuários:
    - [  ] | O número do usuário deve ser único, não podendo haver duplicidade na base de dados;
    - [  ] | O sistema deve limitar o número de tentativas de login falhas (ex: 3 tentativas), bloqueando o usuário temporariamente após exceder o limite;