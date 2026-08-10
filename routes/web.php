<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Language Switcher Route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['pt', 'pt_BR', 'en'])) {
        $appLocale = $locale === 'en' ? 'en' : 'pt_BR';
        session(['locale' => $appLocale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Redirect /en/* or /pt/* to set session locale and remove prefix cleanly
Route::get('/{lang}/{any?}', function ($lang, $any = null) {
    $appLocale = $lang === 'en' ? 'en' : 'pt_BR';
    session(['locale' => $appLocale]);
    return redirect($any ? '/' . $any : '/');
})->where('lang', 'en|pt')->where('any', '.*');

// Standard Application Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/empresa', [HomeController::class, 'empresa'])->name('empresa');
Route::get('/servicos', [HomeController::class, 'servicos'])->name('servicos');
Route::get('/radar', [HomeController::class, 'blog'])->name('blog');
Route::get('/radar/{slug}', [HomeController::class, 'showArticle'])->name('blog.show');
Route::get('/contato', [HomeController::class, 'contato'])->name('contato');
Route::get('/veg-oxi', [HomeController::class, 'vegOxi'])->name('veg-oxi');
Route::get('/insights', [HomeController::class, 'insights'])->name('insights');
