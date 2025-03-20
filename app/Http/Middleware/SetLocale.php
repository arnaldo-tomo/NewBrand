<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o parâmetro locale existe na rota
        if ($request->route('locale')) {
            $locale = $request->route('locale');
            
            // Verifica se o locale é válido (está nos idiomas disponíveis)
            if (array_key_exists($locale, config('app.available_locales'))) {
                App::setLocale($locale);
            } else {
                // Redireciona para o idioma padrão se o locale não for válido
                return redirect('/'.config('app.locale'));
            }
        }

        return $next($request);
    }
    
}