# Disciplina Projeto de Software I
>Nome: **Marcelo Menezes || Fabio Gomes || Laiser Mello || Matuzalem Borges**<br>
>Professor - **Daniel Welfer**<br>

### SmartRecycle
SmartRecycle é um projeto para disciplina [ELC1073] - Projeto de Software I, com o objetivo de otimizar e gerenciar a da coleta de materiais recicláveis, facilitando o contato entre entidades de recebimento e interessados.<br>

##### Chat entre organização e usuário.
- Foi criado um chat básico entre organização e usuário para facilitar a comuicação no momento da reserva.

##### O sistema contará com níveis de usuários
- Nível 0 - SuperAdmin
  - Postar, editar e excluir notícias para tela inicial.
  - Visualizar todos usuários cadastrados.
  - Gerenciar nível de acesso de outros usuários.
  - Postar, editar e excluir itens gerais
- Nível 1 - Usuários
  - Postar, editar e excluir seus itens
- Nível 2 - Organizações
  - Visualizar e reservar itens de usuários.


##### Frameworks e banco de dados utilizados:
- Laravel (Back-end)
- Bootstrap (Front-end)
- Sqlite (Banco de dados)


##### Instalação
- Apache
- Php 7.0+
- Sqlite3 driver
- Rewrite apache
- Composer
- Utilizar SH Migrate para criação do banco base
- Corrigir caminho no arquivo app/config
