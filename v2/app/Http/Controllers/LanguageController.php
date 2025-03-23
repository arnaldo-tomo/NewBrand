<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        // Verifica se o idioma solicitado está entre os disponíveis
        if (array_key_exists($locale, config('app.available_locales'))) {
            // Armazena o idioma na sessão
            Session::put('locale', $locale);
            // Define o idioma da aplicação (importante para a requisição atual)
            App::setLocale($locale);
        }

        // Redireciona para a página anterior com o idioma alterado
        return back();
    }
}