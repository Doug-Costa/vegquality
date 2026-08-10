<?php
/**
 * VegQuality - List articles utility script
 * Uso: https://www.vegquality.com.br/list-articles.php?key=VegDeploy2026Secure
 */

$securityKey = $_GET['key'] ?? '';
$definedKey = 'VegDeploy2026Secure';

if ($securityKey !== $definedKey) {
    http_response_code(403);
    die('Acesso negado.');
}

$basePath = file_exists(__DIR__ . '/artisan') ? __DIR__ : (file_exists(__DIR__ . '/../artisan') ? realpath(__DIR__ . '/..') : __DIR__);
require_once $basePath . '/vendor/autoload.php';
$app = require_once $basePath . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Article;

$articles = Article::all();

echo "<html><body style='font-family: monospace; background: #263238; color: #eceff1; padding: 20px;'>";
echo "<h2>📰 Articles in Database</h2>";
echo "<pre style='background: #1e272c; padding: 15px; border-radius: 5px; color: #80cbc4; overflow-x: auto;'>";
echo htmlspecialchars(json_encode($articles, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "</pre></body></html>";
