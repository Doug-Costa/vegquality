<?php
/**
 * VegQuality - Hostinger Remote Deploy Script
 * Uso: https://www.vegquality.com.br/deploy-vegquality.php?key=VegDeploy2026Secure
 */

$securityKey = $_GET['key'] ?? '';
$definedKey = 'VegDeploy2026Secure'; // Alterar para a chave de produção

if ($securityKey !== $definedKey) {
    http_response_code(403);
    die('Acesso negado. Chave de deploy inválida.');
}

echo "<html><body style='font-family: monospace; background: #1b5e20; color: #e8f5e9; padding: 20px;'>";
echo "<h2>🚀 VegQuality Deploy Pipeline Started...</h2>";
echo "<pre style='background: #000; color: #0f0; padding: 15px; border-radius: 5px;'>";

// Ajusta o diretório para a raiz do Laravel (um nível acima da public)
$basePath = realpath(__DIR__ . '/..');

// 1. Cria o arquivo .env automaticamente se ele não existir
$envPath = $basePath . '/.env';
if (!file_exists($envPath)) {
    echo "📝 Arquivo .env nao encontrado. Criando automaticamente com as configuracoes de producao...\n";
    $envContent = "APP_NAME=VegQuality\n" .
                  "APP_ENV=production\n" .
                  "APP_KEY=base64:Qjw6ygCCIgwKJISf/ZsKBlPHjy8EBtFPd7JNVyijzx0=\n" .
                  "APP_DEBUG=false\n" .
                  "APP_URL=https://lightcyan-yak-555982.hostingersite.com\n\n" .
                  "APP_LOCALE=pt_BR\n" .
                  "APP_FALLBACK_LOCALE=pt_BR\n\n" .
                  "LOG_CHANNEL=stack\n" .
                  "LOG_LEVEL=error\n\n" .
                  "DB_CONNECTION=mysql\n" .
                  "DB_HOST=127.0.0.1\n" .
                  "DB_PORT=3306\n" .
                  "DB_DATABASE=u454138924_veg\n" .
                  "DB_USERNAME=u454138924_veg\n" .
                  "DB_PASSWORD=Veg2026@\n\n" .
                  "SESSION_DRIVER=database\n" .
                  "SESSION_LIFETIME=120\n\n" .
                  "CACHE_STORE=database\n" .
                  "QUEUE_CONNECTION=database\n";
    if (file_put_contents($envPath, $envContent)) {
        echo "✅ Arquivo .env criado com sucesso na raiz!\n\n";
    } else {
        echo "❌ Falha ao criar o arquivo .env automaticamente. Verifique as permissoes de escrita na raiz.\n\n";
    }
}

// 1. Extração automática do ZIP se estiver presente
$zipPath = $basePath . '/vegquality-deploy.zip';
if (file_exists($zipPath)) {
    echo "📦 Encontrado arquivo zip de deploy: vegquality-deploy.zip. Extraindo...\n";
    if (class_exists('ZipArchive')) {
        $zip = new ZipArchive;
        if ($zip->open($zipPath) === TRUE) {
            $zip->extractTo($basePath);
            $zip->close();
            echo "✅ Zip extraído com sucesso na raiz!\n\n";
            // Para segurança e economia de espaço, removemos o zip após extrair
            @unlink($zipPath);
            echo "🗑️ Arquivo zip temporário removido do servidor.\n\n";
        } else {
            echo "❌ Erro ao abrir o arquivo zip de deploy.\n\n";
        }
    } else {
        echo "❌ Classe ZipArchive não disponível no PHP do servidor. Por favor, extraia manualmente pelo painel da Hostinger.\n\n";
    }
} else {
    echo "ℹ️ Nenhum arquivo vegquality-deploy.zip encontrado para extração em " . htmlspecialchars($basePath) . ". Prosseguindo com o pipeline...\n\n";
}


// Função auxiliar para aplicar permissões recursivamente via PHP
function chmod_recursive($path, $dirMode = 0777, $fileMode = 0666) {
    if (!is_dir($path)) {
        return @chmod($path, $fileMode);
    }
    $dh = @opendir($path);
    if (!$dh) return false;
    while (($file = readdir($dh)) !== false) {
        if ($file != '.' && $file != '..') {
            $fullpath = $path . '/' . $file;
            if (is_dir($fullpath)) {
                chmod_recursive($fullpath, $dirMode, $fileMode);
            } else {
                @chmod($fullpath, $fileMode);
            }
        }
    }
    closedir($dh);
    return @chmod($path, $dirMode);
}

// Lista de pastas críticas de escrita que devem existir no Laravel
$requiredFolders = [
    $basePath . '/bootstrap/cache',
    $basePath . '/storage',
    $basePath . '/storage/app',
    $basePath . '/storage/app/private',
    $basePath . '/storage/app/public',
    $basePath . '/storage/framework',
    $basePath . '/storage/framework/cache',
    $basePath . '/storage/framework/cache/data',
    $basePath . '/storage/framework/sessions',
    $basePath . '/storage/framework/views',
    $basePath . '/storage/logs',
    $basePath . '/storage/tmp',
    $basePath . '/public/storage',
];

echo "Garantindo estrutura de pastas de storage/ , bootstrap/ e permissões...\n";
foreach ($requiredFolders as $folder) {
    if (!is_dir($folder)) {
        if (@mkdir($folder, 0777, true)) {
            echo "Criada pasta: " . str_replace($basePath, '', $folder) . "\n";
        } else {
            echo "Falha ao criar pasta: " . str_replace($basePath, '', $folder) . "\n";
        }
    }
    @chmod($folder, 0777);
}

// Aplica permissões recursivas para garantir que o PHP possa ler/escrever em tudo
chmod_recursive($basePath . '/bootstrap/cache', 0777, 0666);
chmod_recursive($basePath . '/storage', 0777, 0666);
chmod_recursive($basePath . '/public/storage', 0777, 0666);
echo "Permissões aplicadas com sucesso em /bootstrap/cache, /storage e /public/storage.\n\n";

$commands = [
    // Instala dependências PHP otimizadas (Descomente se a Hostinger permitir exec do composer)
    // "cd {$basePath} && composer install --optimize-autoloader --no-dev 2>&1",
    
    // Limpa os caches da aplicação
    "cd {$basePath} && php artisan optimize:clear 2>&1",
    "cd {$basePath} && php artisan config:cache 2>&1",
    "cd {$basePath} && php artisan route:cache 2>&1",
    "cd {$basePath} && php artisan view:cache 2>&1",
    
    // Roda migrations pendentes em produção
    "cd {$basePath} && php artisan migrate --force 2>&1",
    
    // Roda os seeders para criar/atualizar o usuário administrador
    "cd {$basePath} && php artisan db:seed --force 2>&1",
    
];

foreach ($commands as $cmd) {
    echo "<b>> {$cmd}</b>\n";
    $output = shell_exec($cmd);
    echo htmlspecialchars($output) . "\n\n";
}

echo "</pre>";
echo "<h3>✅ Pipeline Finalizado!</h3>";
echo "</body></html>";
