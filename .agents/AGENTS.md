# Diretrizes Críticas do Projeto VegQuality

## 🚫 REGRA ABSOLUTA DE PROTEÇÃO DE DADOS, SEEDERS E MIGRATIONS

1. **NUNCA crie, execute ou sugira seeders ou migrations de dados que alterem, atualizem, insiram, trunquem ou sobrescrevam registros das tabelas `sections`, `pages`, `articles` ou qualquer outra tabela do banco de dados sem a autorização prévia e expressa do usuário.**
2. **PROIBIDO sobrescrever ou retirar dados/textos:** NUNCA execute comandos ou modifique arquivos que possam apagar, alterar, retirar ou resetar textos, mídias e edições cadastrados anteriormente no banco ou no site (seja via painel Filament ou produção).
3. **Consulta prévia obrigatória:** SEMPRE me consultar antes de qualquer alternativa, modificação ou tentativa que envolva alteração de dados, seeders, migrações ou manipulação de banco de dados.
4. **Novas funcionalidades e visibilidade:** Qualquer nova funcionalidade de visibilidade, tradução ou configuração DEVE ser mantida exclusivamente dentro do campo de conteúdo (`$content` JSON) já existente nas seções, sem criar arquivos de migração (`database/migrations`) ou alterar a estrutura física do banco.
