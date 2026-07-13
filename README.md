# EcoTech — Agendamento de Coleta de Lixo Eletrônico

Projeto desenvolvido em 2023 como PPI (Projeto Prático Interdisciplinar):
site em PHP + MySQL para agendamento de coleta de lixo eletrônico.

Esta versão passou por uma **limpeza para publicação** — correção de bugs
de lógica, remoção de código morto e separação das credenciais — mantendo
a arquitetura original de 2023. A lista completa do que mudou está em
[CHANGES.md](CHANGES.md). Uma modernização (PHP 8.3+, depois Laravel) está
planejada — ver *Roadmap*.

## Funcionalidades

- Cadastro e login de usuários (com sessão PHP)
- Agendamento de coleta: tipo de lixo eletrônico, quantidade, tamanho
  (pequeno/médio/grande) e instruções adicionais
- Listagem e exclusão dos próprios agendamentos
- Página de perfil com dados do usuário e do agendamento
- Página institucional de serviços

## Stack

- **Backend:** PHP (procedural, mysqli)
- **Banco de dados:** MySQL/MariaDB — schema em [`database.sql`](database.sql)
- **Frontend:** HTML, CSS, W3.CSS, fonte Poppins
- **Ambiente:** servidor local (XAMPP, WAMP ou similar)

## Estrutura

```
PPI/
├── conexao.inc.php     # Conexão única com o banco (usa config.php)
├── config.example.php  # Modelo de configuração (copie para config.php)
├── PAGINICIAL/         # Página inicial (index.php)
├── PAGLOGIN/           # Login e cadastro
├── PAGSERVICO/         # Página institucional
└── PAGAGENDAMENTO/     # Agendar, meus agendamentos, perfil, confirmação
```

## Como rodar

1. Instale XAMPP (ou similar) com PHP e MySQL
2. Copie a pasta `PPI/` para `htdocs/`
3. Importe o banco: `database.sql` (via phpMyAdmin → Importar, ou
   `mysql -u root < database.sql`)
4. Copie `PPI/config.example.php` para `PPI/config.php` e preencha com
   suas credenciais do MySQL
5. Acesse `http://localhost/PPI/PAGINICIAL/index.php`

## Limitações conhecidas

Este código preserva a arquitetura de 2023 e **não deve ir a produção**:

- Queries SQL concatenam entrada do usuário (vulnerável a SQL injection)
- Senhas armazenadas em texto puro (sem `password_hash()`)
- Saída sem escape (`htmlspecialchars()`), risco de XSS
- Campo `data` existe no banco mas o formulário ainda não o preenche

Esses pontos serão tratados na fase de modernização.

## Roadmap

- [x] Limpeza e publicação da versão original corrigida
- [ ] Refatorar fluxo de login em PHP 8.3 (PDO, password_hash, enums)
- [ ] Migrar para Laravel (Blade, Eloquent, Breeze, migrations)
- [ ] Data/horário no agendamento e status (pendente → coletado)
- [ ] Painel administrativo para gestão das coletas
