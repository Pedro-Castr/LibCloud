# LibCloud

LibCloud é um sistema simples de controle de estoque e empréstimos de livros, desenvolvido como trabalho acadêmico. O sistema é voltado para a Biblioteca da Universidade ABC e permite gerenciar livros, exemplares, usuários e empréstimos.

## Funcionalidades

- Cadastro de livros com título, ISBN, autores, editora, edição e ano.
- Controle de exemplares com número de patrimônio, estado de conservação e localização.
- Cadastro de usuários (alunos e professores) com dados como CPF, matrícula/registro e curso/departamento.
- Empréstimo de livros com regras específicas por tipo de usuário:
  - Alunos: até 3 livros por 7 dias.
  - Professores: até 5 livros por 15 dias.
- Cálculo de multa por atraso (R$1,00 por dia útil).
- Histórico de empréstimos por usuário.

## Tecnologias utilizadas

- **PHP** com o micro framework **AtomPHP**
- **JavaScript**
- **HTML/CSS**
- **MySQL** (para persistência dos dados)

## Observações

Este sistema é um projeto acadêmico, sem fins comerciais.
