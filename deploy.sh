#!/bin/bash
set -e

echo "🚀 Iniciando deploy via Git no servidor..."

# Entra na raiz do projeto
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
cd "$DIR"

# 1. Puxa as alterações mais recentes do repositório Git
echo "📥 Puxando código atualizado do Git (git pull)..."
git pull origin main

# 2. Executa as migrações de banco de dados pendentes
echo "🗄️ Executando migrações de banco (php artisan migrate)..."
php artisan migrate --force

# 3. Limpa e regenera os caches de performance do Laravel
echo "🧹 Otimizando caches da aplicação..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Deploy concluído com sucesso!"
