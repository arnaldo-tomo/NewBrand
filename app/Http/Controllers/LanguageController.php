<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switchLang(Request $request, $locale)
    {
        // Check if the locale exists in our available locales
        if (array_key_exists($locale, config('app.available_locales'))) {
            Session::put('locale', $locale);
        }
        
        return redirect()->back();
    }
}