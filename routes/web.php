<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Language Switcher Route
Route::get('/lang/{locale}', [HomeController::class, 'switchLang'])->name('lang.switch');

// Redirect /en/* or /pt/* to set session locale and remove prefix cleanly
Route::get('/{lang}/{any?}', [HomeController::class, 'handleLocalizedRoute'])
    ->where('lang', 'en|pt')
    ->where('any', '.*');

// Standard Application Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Empresa / About Us
Route::get('/empresa', [HomeController::class, 'empresa'])->name('empresa');
Route::get('/about-us', [HomeController::class, 'empresa']);
Route::get('/about', [HomeController::class, 'empresa']);

// Serviços / Services
Route::get('/servicos', [HomeController::class, 'servicos'])->name('servicos');
Route::get('/services', [HomeController::class, 'servicos']);

// Radar FLV / Blog
Route::get('/radar', [HomeController::class, 'blog'])->name('blog');
Route::get('/radar/{slug}', [HomeController::class, 'showArticle'])->name('blog.show');

// Contato / Contact Us
Route::get('/contato', [HomeController::class, 'contato'])->name('contato');
Route::get('/contact', [HomeController::class, 'contato']);
Route::get('/contact-us', [HomeController::class, 'contato']);

// Veg Oxi 200
Route::get('/veg-oxi', [HomeController::class, 'vegOxi'])->name('veg-oxi');

// Insights
Route::get('/insights', [HomeController::class, 'insights'])->name('insights');
