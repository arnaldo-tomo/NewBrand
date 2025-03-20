<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect('/'.config('app.locale'));
});

// Rotas com prefixo de idioma
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|pt'], // Define explicitamente os idiomas permitidos
     'middleware' => \App\Http\Middleware\SetLocale::class,
], function () {
    // Página inicial
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    // Adicione suas outras rotas aqui
});

// Rota para mudar de idioma
Route::get('language/{newLocale}', function ($newLocale) {
    // Verifica se o idioma solicitado está disponível
    if (array_key_exists($newLocale, config('app.available_locales'))) {
        // Obtém a URL atual
        $currentUrl = url()->previous();
        
        // Extrai o locale atual da URL
        $segments = explode('/', parse_url($currentUrl, PHP_URL_PATH));
        $currentLocale = $segments[1] ?? config('app.locale');
        
        // Só continua se o locale atual for válido
        if (array_key_exists($currentLocale, config('app.available_locales'))) {
            // Substitui o locale atual pelo novo na URL
            $newUrl = str_replace('/'.$currentLocale.'/', '/'.$newLocale.'/', $currentUrl);
            
            // Redireciona para a nova URL
            return redirect($newUrl);
        }
    }
    
    // Fallback - redireciona para a página inicial no idioma padrão
    return redirect('/'.config('app.locale'));
})->name('language.switch');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});



require __DIR__.'/auth.php';
