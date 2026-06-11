<?php
/**
 * VegQuality - Log Viewer
 * Uso: https://[dominio]/view-log.php?key=VegDeploy2026Secure
 */

$securityKey = $_GET['key'] ?? '';
$definedKey = 'VegDeploy2026Secure';

if ($securityKey !== $definedKey) {
    http_response_code(403);
    die('Acesso negado.');
}

$logFile = __DIR__ . '/../storage/logs/laravel.log';

echo "<html><body style='font-family: monospace; background: #263238; color: #eceff1; padding: 20px;'>";
echo "<h2>📋 Laravel Log Viewer</h2>";

if (!file_exists($logFile)) {
    die("Arquivo de log não encontrado em: " . htmlspecialchars($logFile));
}

$content = file_get_contents($logFile);
// Retorna os últimos 15000 caracteres para garantir que veremos o erro completo
$offset = max(0, strlen($content) - 15000);
$lastChunk = substr($content, $offset);

echo "<h3>Últimas mensagens e erros do log:</h3>";
echo "<pre style='background: #000; color: #0f0; padding: 15px; border-radius: 5px; overflow-x: auto; white-space: pre-wrap;'>";
echo htmlspecialchars($lastChunk);
echo "</pre>";
echo "</body></html>";
