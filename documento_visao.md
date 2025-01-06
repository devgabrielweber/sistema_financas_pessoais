# Documento de Visão - Sistema de Controle de Finanças Pessoais

## 1. Introdução

### 1.1. Objetivo
O objetivo deste documento é apresentar a visão geral do projeto para o desenvolvimento de um **Sistema de Controle de Finanças Pessoais**. Este sistema permitirá que os usuários controlem e visualizem suas receitas e despesas, ajudando-os a manter o orçamento equilibrado e a tomar decisões financeiras informadas.

### 1.2. Escopo
Este sistema terá funcionalidades de gerenciamento de contas, categorização de despesas e relatórios de fluxo de caixa e lembretes de vencimento de pagamentos. O sistema será acessível via interface web.

### 1.3. Definições, Acrônimos e Abreviações
- **Usuário:** Pessoa que utilizará o sistema para gerenciar suas finanças pessoais.
- **Saldo:** Quantia disponível na conta do usuário após as receitas e despesas serem registradas.
- **Relatórios:** Visualizações de dados financeiros, como gráficos e tabelas.
- **Transações:** Podem ser divididas em duas categorias, sendo elas: **Receitas** e **Despesas**
- **Beneficiário:** A pessoa física ou jurídica recebedora de uma transação

## 2. Descrição Geral

### 2.1. Visão do Produto
O **Sistema de Controle de Finanças Pessoais** permitirá aos usuários:
- Registrar receitas e despesas diárias.
- Categorizar transações (ex: alimentação, transporte, lazer).
- Visualizar relatórios de fluxo de caixa.
- Definir orçamentos mensais por categoria e por conta.

### 2.2. Funcionalidades Principais
- **Registro de transações financeiras:** Permite a entrada de informações sobre receitas e despesas, com categorias definíveis.
- **Contas:** O usuário poderá registrar contas bancárias para controlar saldo..
- **Orçamento:** Definir limites para cada categoria de gasto e visualizar a evolução de seu cumprimento.

## 3. Requisitos Funcionais

### 3.1. Registro de Transações
- O usuário poderá registrar novas receitas ou despesas com a data, valor, categoria, beneficiário e uma descrição.
- O sistema deve permitir a edição e exclusão de transações registradas.

### 3.2. Registro de Categorias
- O usuário poderá registrar categorias de transações, para melhor controle.

### 3.3. Registro de Beneficiários
- O usuário poderá registrar beneficiários, para melhor controle.

### 3.4. Relatórios e Visualizações
- Relatórios de fluxo de caixa devem detalhar as entradas e saídas, permitindo o acompanhamento de saldos ao longo do tempo.

### 3.5. Gerenciamento de Orçamento
- O usuário poderá definir um orçamento mensal para cada categoria de despesa.
- O sistema alertará o usuário quando ele estiver perto de ultrapassar o orçamento em qualquer categoria.

## 4. Requisitos Não Funcionais

### 4.1. Desempenho
- O sistema deve ser capaz de processar até 10.000 transações de forma eficiente, com tempo de resposta inferior a 3 segundos para consulta e geração de relatórios.

### 4.2. Usabilidade
- O sistema deve ser fácil de usar, com uma interface intuitiva, especialmente para usuários não técnicos.
- O design da interface deve ser responsivo, ou seja, adaptável a desktops.

## 5. Restrições

### 5.1. Tecnológicas
- O sistema será desenvolvido usando a stack **HTML/CSS/JS** para o front-end e **PHP** para o back-end, com um banco de dados **MySQL**.
- O sistema não deve depender de plugins ou bibliotecas de terceiros que possam comprometer a segurança ou a manutenção a longo prazo.

## 6. Riscos

### 6.1. Adoção do Usuário
- O risco de baixa adoção por parte dos usuários é elevado, caso a interface não seja intuitiva ou se o sistema for difícil de usar.

### 6.2. Desempenho em Grande Escala
- A performance do sistema deve ser cuidadosamente monitorada, especialmente em picos de uso com muitos usuários registrados e transações.

## 7. Conclusão

Este documento delineia a visão inicial para o desenvolvimento de um Sistema de Controle de Finanças Pessoais. As funcionalidades principais incluem o controle de receitas e despesas, geração de relatórios e alertas de vencimento, visando proporcionar aos usuários uma ferramenta eficaz para o gerenciamento de suas finanças. Com isso, espera-se garantir a satisfação dos usuários e o sucesso do projeto.
