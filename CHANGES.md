# Registro de mudanças — limpeza para publicação (2026)

Correções feitas sobre o código original de 2023, preservando a
arquitetura. Nada de modernização ainda (PDO, hash de senha etc. virão
em etapa própria) — aqui foram só bugs de lógica, código morto e
organização.

## Renomeações

- `PAGINICIAL/testeheitor.PHP` → `PAGINICIAL/index.php` (todas as
  referências em links e redirects foram atualizadas)
- foto pessoal de teste em `uploads/` → removida do repositório (privacidade;
  a pasta `uploads/` agora é ignorada pelo Git)

## Segurança / organização de credenciais

- As credenciais do banco apareciam em **12 arquivos** (7 cópias de
  `conexao.inc.php` + 5 arquivos com conexão inline). Agora existe um
  único `conexao.inc.php` na raiz de `PPI/`, que lê as credenciais de
  `config.php` — arquivo **fora do Git** (ver `config.example.php`).
- Removido o `echo "Conexão bem-sucedida..."` que imprimia texto de
  debug no topo de todas as páginas.
- Adicionado `set_charset("utf8mb4")` à conexão (acentos corretos).

## Bugs de lógica corrigidos

- **Redirects quebrados após `echo`** (`processar_registro.php`,
  `agendar.php`): havia `echo` antes de `header("Location: ...")`, o que
  causa "headers already sent" e impede o redirecionamento.
- **`exit()` ausente após redirects** (`processar_login.php`, `sair.php`):
  sem ele o script continua executando após o redirect.
- **`sair.php` dava 404**: o redirect era relativo (`teladelogin.php`),
  que só existe em PAGLOGIN. Agora usa caminho absoluto. As 4 cópias
  foram unificadas no mesmo conteúdo correto.
- **`session_start()` no meio do HTML** (`index.php`, `servico.php`,
  `confirmacao.php`): movido para o topo dos arquivos. Chamar após já
  haver saída HTML só funcionava por causa do output_buffering do XAMPP.
- **`agendar.php` — checagem de duplicidade nunca funcionava**: consultava
  uma coluna `cpf` que não existe na tabela `agendamentos` (e o formulário
  nem envia CPF). Agora verifica se o usuário logado já possui agendamento.
- **`MeusAgendamentos.php` — três problemas graves:**
  1. Exibia colunas (`nome_completo`, `cpf`, `endereco`, `telefone`,
     `email`, `pagamento`) que não existem na tabela `agendamentos` —
     agora há JOIN com `usuarios` e a tabela mostra só colunas reais;
  2. Listava agendamentos de **todos** os usuários — agora filtra pelo
     usuário logado, e a exclusão também só permite excluir os próprios;
  3. Tentava "renumerar" IDs após exclusões usando uma coluna inexistente
     (`idagendamento`) — removido; IDs de banco não devem ser renumerados.
- **JavaScript quebrado** (`agendar.php`, `MeusAgendamentos.php`): os
  scripts referenciavam elementos inexistentes (`#agendar`, `#telefone`,
  `#cpf`, `#green-button`, `#redirecionar`, `#navbar`, `#mySidebar`),
  fazendo a execução falhar no primeiro erro. Substituídos por versão
  mínima funcional (voltar ao topo + efeito da navbar ao rolar).
- **`</form>` mal posicionado** em `agendar.php` (fechava depois dos
  scripts) — corrigido.
- **CSS inexistente** (`seu_estilo.css`) referenciado por
  `teladelogin.php` e `criarconta.php` — criado `estilo_login.css`.
- **Links quebrados na navbar de `confirmacao.php`** (relativos a
  arquivos de outras pastas) — corrigidos para caminhos absolutos, e o
  logo apontava para `ppiimagem.jpg` sem a pasta `IMG/`.
- **Typo** em `servico.php` (`>` sobrando no texto de um link).

## Código morto removido

Arquivos que nada referenciava e/ou que quebrariam se executados
(detalhes de por que cada um era morto estão no histórico do projeto):

- `PAGLOGIN/processar_log.php` (login alternativo abandonado, com o
  código duplicado dentro do próprio arquivo e coluna inexistente)
- `PAGLOGIN/cadastro_completo.php` (inseria numa tabela `cadastro` que
  não existe no schema)
- `PAGAGENDAMENTO/confirmacao_agendamento.php` (confirmação alternativa
  sem nenhum link apontando para ela)
- `PAGINICIAL/logout.php` (duplicata quebrada de `sair.php`)
- `PAGAGENDAMENTO/stylesagendar1.css` e `styleperfis.css` (versões
  antigas de estilos, não referenciadas)
- `PAGCADASTRO/` (pasta só com cópias de `conexao.inc.php` e `sair.php`)
- Cópia perdida de `conexao.inc.php` dentro de `PAGAGENDAMENTO/IMG/`

## Banco de dados

- Criado `database.sql` reconstruindo o schema a partir do diagrama
  `DATABASEPPI_.PNG`, com uma diferença intencional: a coluna `data` de
  `agendamentos` agora aceita NULL, já que o formulário ainda não a
  preenche (no modo estrito do MySQL o INSERT falharia).
