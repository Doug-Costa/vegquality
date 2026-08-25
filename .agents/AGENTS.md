# Diretrizes Críticas do Projeto VegQuality

## 🚫 REGRA ABSOLUTA DE PROTEÇÃO DE DADOS, SEEDERS E MIGRATIONS

1. **NUNCA crie, execute ou sugira seeders ou migrations de dados que alterem, atualizem, insiram ou sobrescrevam registros das tabelas `sections`, `pages`, `articles` ou qualquer outra tabela do banco de dados sem a autorização prévia e expressa do usuário.**
2. **PROIBIDO sobrescrever dados:** NUNCA execute ou inclua comandos que possam apagar ou resetar conteúdos e edições cadastrados pelos clientes no painel administrativo (Filament).
3. **Novas funcionalidades e visibilidade:** Qualquer nova funcionalidade de visibilidade, tradução ou configuração DEVE ser mantida exclusivamente dentro do campo de conteúdo (`$content` JSON) já existente nas seções, sem criar arquivos de migração (`database/migrations`) ou alterar a estrutura física do banco.
