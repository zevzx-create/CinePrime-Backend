# CinePrime - Backend System

Sistema de gestão de cinema focado na automação de venda de ingressos e controle de sessões.

## Sobre o Projeto
O **CinePrime** foi desenvolvido como parte do módulo de Desenvolvimento de Sistemas. O objetivo é simular a camada de back-end de um cinema, gerenciando a relação entre filmes, salas, sessões e a venda final de ingressos.

##  Tecnologias Utilizadas
- **Linguagem:** C# (.NET)
- **Banco de Dados:** SQL Server / MySQL (Script fornecido)
- **Arquitetura:** Camadas (Models e Services)

##  Estrutura do Repositório
- `/Database`: Contém o script `.sql` para criação do banco de dados e tabelas.
- `/src/Models`: Classes de entidade (Filmes, Clientes, Ingressos).
- `/src/Services`: Lógica de negócio para processamento de vendas.
- `Program.cs`: Simulação de execução do sistema.

##  Como Executar
1. Clone o repositório.
2. Execute o script em `Database/cinema_db.sql` no seu gerenciador de banco de dados.
3. Abra a pasta `src` no Visual Studio ou VS Code.
4. Execute o arquivo `Program.cs`.

##  Funcionalidades Implementadas
- [x] Modelagem de Banco de Dados Relacional.
- [x] Cadastro de Filmes e Salas.
- [x] Lógica de emissão de ingressos.
- [x] Listagem de vendas realizadas.
