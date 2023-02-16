## Projeto Petshop

Esse projeto foi feito ao longo de um curso de um ano, foi meu primeiro contato com programação

## O que precisa saber para utilizar o projeto?

- O projeto não foi finalizado
- Esse projeto tem interação com um banco de dados, então há informações que precisam ser alteradas para diferentes usuários
- Valores que devem ser alterados:
  `lib/database.php`: todas as informações de conexão do banco de dados
  `lib/config.php`: a constante que representa o email do usuário
  `src/controller/emailController.php`: no objeto email, a senha deve ser alterada de acordo com a senha do email utilizada [obs: se o email não for @outlook, a conexão do servidor de email deve ser alterada, com os valores do respectivo email]
  `lib/script_petshop.sql` e `lib/insert_cidade_petshop.sql`: são os scripts que criam o banco de dados com as tabelas prontas, e o insert de valores das cidades
