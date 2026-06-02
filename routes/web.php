<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/empresa', [HomeController::class, 'empresa']);
Route::get('/servicos', [HomeController::class, 'servicos']);
Route::get('/radar', [HomeController::class, 'blog']);
Route::get('/radar/{slug}', [HomeController::class, 'showArticle']);
Route::get('/contato', [HomeController::class, 'contato']);

