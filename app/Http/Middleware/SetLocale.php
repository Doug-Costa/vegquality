<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['en', 'pt'])) {
            $appLocale = $locale === 'en' ? 'en' : 'pt_BR';
            app()->setLocale($appLocale);
            session(['locale' => $appLocale]);
        } elseif (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            app()->setLocale('pt_BR');
        }

        return $next($request);
    }
}
