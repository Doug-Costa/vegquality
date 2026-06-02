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
    
    // Garante o link simbólico para os uploads do Filament (Rodar apenas 1x, pode falhar se já existir)
    "cd {$basePath} && php artisan storage:link 2>&1",
];

foreach ($commands as $cmd) {
    echo "<b>> {$cmd}</b>\n";
    $output = shell_exec($cmd);
    echo htmlspecialchars($output) . "\n\n";
}

echo "</pre>";
echo "<h3>✅ Pipeline Finalizado!</h3>";
echo "</body></html>";
