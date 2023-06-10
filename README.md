<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Sobre o projeto

Uma aplicação para gerenciamento de atividades/tarefas. Permite ao usuário:
    - criar
    - ler
    - atualizar
    - deletar   
Também conta com recursos extras de ordenação e filtragem. 
Tudo feito em laravel.
## Autenticação

A autenticação de usuário é bem simples. Devido proposta ser um pouco mais simples foi-se optado por pular a criação de um registro por parte do usuario para criação de JWT. a outra solução foi a criação de um usuario no banco e checkar se esse dado existe.

## Rotas

### / - GET
 Retorna uam lista tarefas. 

#### parametros

 - ?search = $valor
    retorna a lista de tarefa que contém o valor no título. 
- ?page = $valor
    retorna a lista de tarefa correspondente a página.
- ?ordem = $valor
    retorna a lista de tarefa ordenada(descrescente/crescente).
- ?coluna = $valor
    retorna a lista de tarefa ordenada pela coluna selecionada.

### /createToken - GET

Insere no banco um usuario que é usado para autenticação.
### /limparToken - GET

Deleta no banco o usuario que é usado para autenticação.


### /insertTask - POST

Insere uma nova tarefa caso os valores não forem vazios.

### /updateTask - POST

Atualiza uma tarefa caso os valores não forem vazios.

### /deleteTask - delete

Deleta uma tarefa.

## Licença

O framework Laravel é open-sourced software licensed sob a [MIT license](https://opensource.org/licenses/MIT).
