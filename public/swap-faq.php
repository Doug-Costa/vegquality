<?php
/**
 * VegQuality - Swap FAQ translations utility script
 * Uso: https://www.vegquality.com.br/swap-faq.php?key=VegDeploy2026Secure
 */

// Simple security check
$securityKey = $_GET['key'] ?? '';
$definedKey = 'VegDeploy2026Secure';

if ($securityKey !== $definedKey) {
    http_response_code(403);
    die('Acesso negado.');
}

// Bootstrap Laravel
$basePath = file_exists(__DIR__ . '/artisan') ? __DIR__ : (file_exists(__DIR__ . '/../artisan') ? realpath(__DIR__ . '/..') : __DIR__);
require_once $basePath . '/vendor/autoload.php';
$app = require_once $basePath . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Section;

$section = Section::where('key', 'servicos_faq')->first();

if (!$section) {
    die("Seção servicos_faq não encontrada.");
}

$content = $section->content;
$faqs = $content['faqs'] ?? [];

echo "<html><body style='font-family: monospace; background: #263238; color: #eceff1; padding: 20px;'>";
echo "<h2>🔄 VegQuality FAQ Translation Swap Utility</h2>";

echo "<h3>Antes do swap (Current State):</h3>";
echo "<pre style='background: #1e272c; padding: 15px; border-radius: 5px; color: #80cbc4; overflow-x: auto;'>";
echo htmlspecialchars(json_encode($faqs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "</pre>";

$swappedFaqs = [];
foreach ($faqs as $faq) {
    $tempQuestion = $faq['question'] ?? '';
    $tempAnswer = $faq['answer'] ?? '';

    // Swap question
    $faq['question'] = $faq['question_en'] ?? '';
    $faq['question_en'] = $tempQuestion;

    // Swap answer
    $faq['answer'] = $faq['answer_en'] ?? '';
    $faq['answer_en'] = $tempAnswer;

    $swappedFaqs[] = $faq;
}

$content['faqs'] = $swappedFaqs;
$section->content = $content;

if (isset($_GET['execute']) && $_GET['execute'] === '1') {
    $section->save();
    echo "<h2 style='color: #4caf50;'>✅ Swap executado e salvo no banco de dados com sucesso!</h2>";
} else {
    $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $executeUrl = $currentUrl . "&execute=1";
    echo "<h2 style='color: #ffb74d;'>⚠️ Modo de visualização (simulação). Nenhuma alteração foi salva ainda.</h2>";
    echo "<p><a href='" . htmlspecialchars($executeUrl) . "' style='background: #ffb74d; color: #263238; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 3px;'>Executar e Salvar Alterações</a></p>";
}

echo "<h3>Depois do swap (Proposed State):</h3>";
echo "<pre style='background: #1e272c; padding: 15px; border-radius: 5px; color: #a5d6a7; overflow-x: auto;'>";
echo htmlspecialchars(json_encode($swappedFaqs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "</pre>";

echo "</body></html>";
