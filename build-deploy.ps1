# Script de preparacao e compactacao para Hostinger (VegQuality)
# Execute este script no PowerShell da raiz do projeto para gerar o ZIP de deploy.

Write-Host "Iniciando preparacao do deploy..." -ForegroundColor Green

# 1. Compila os assets locais para a pasta public/build
Write-Host "Compilando assets do frontend (Vite)..." -ForegroundColor Yellow
npm run build

# Remove o arquivo public/hot se existir, para evitar que o Laravel procure o servidor de desenvolvimento local
if (Test-Path "public/hot") {
    Write-Host "Removendo arquivo public/hot residual..." -ForegroundColor Gray
    Remove-Item "public/hot"
}

# 2. Define o arquivo ZIP de saida
$zipFile = "vegquality-deploy.zip"
if (Test-Path $zipFile) {
    Write-Host "Removendo ZIP anterior..." -ForegroundColor Gray
    Remove-Item $zipFile
}

# 3. Define itens para compactar (excluindo node_modules, .git, .env, testes, etc)
$itemsToCompress = @(
    "app",
    "bootstrap",
    "config",
    "database",
    "public",
    "resources",
    "routes",
    "storage",
    "vendor",
    "artisan",
    "composer.json",
    "composer.lock",
    "package.json"
)

# 4. Compacta os arquivos usando Python para garantir compatibilidade com Linux (Hostinger)
Write-Host "Compactando arquivos com compatibilidade Linux..." -ForegroundColor Yellow
python zip-deploy.py

Write-Host "Projeto compactado com sucesso!" -ForegroundColor Green
Write-Host "Faca o upload do arquivo vegquality-deploy.zip para a Hostinger." -ForegroundColor Cyan

