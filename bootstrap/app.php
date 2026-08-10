<?php

// Silencia/ignora o aviso de tempnam() logo no início do boot da aplicação (essencial para hospedagem compartilhada como Hostinger)
set_error_handler(function ($severity, $message) {
    if ($severity === E_WARNING && str_contains($message, 'tempnam()')) {
        return true; // Ignora e silencia o aviso
    }
    return false; // Retorna false para permitir que o PHP ou o Laravel processe outros erros normalmente
});


// Configura o diretório temporário para evitar avisos/erros do tempnam() em hospedagens compartilhadas (como a Hostinger)
$tmpDir = dirname(__DIR__) . '/storage/tmp';
if (!is_dir($tmpDir)) {
    @mkdir($tmpDir, 0777, true);
}
if (is_dir($tmpDir) && is_writable($tmpDir)) {
    putenv("TMPDIR={$tmpDir}");
    putenv("TEMP={$tmpDir}");
    putenv("TMP={$tmpDir}");
    $_ENV['TMPDIR'] = $tmpDir;
    $_ENV['TEMP'] = $tmpDir;
    $_ENV['TMP'] = $tmpDir;
}

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
