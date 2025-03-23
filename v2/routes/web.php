<?php

use App\Http\Controllers\VisitorDashboardController;
use App\Http\Controllers\VisitorTrackingController;
use App\Http\Controllers\VisitorsAnalyticsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MediaLibraryController;
use App\Http\Controllers\SitePerformanceController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ApiTokenController;
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

    Route::get('/blog', function () {
        return view('blog');
    })->name('blog');

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

Route::get('dashboard',[VisitorDashboardController::class,'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    // Visitantes
Route::get('/visitantes/analytics', [VisitorsAnalyticsController::class, 'index'])->name('visitors.analytics');
Route::get('/visitantes/export', [VisitorsAnalyticsController::class, 'export'])->name('visitors.export');

// Projetos do Portfólio
Route::get('/portfolio/projetos', [PortfolioController::class, 'index'])->name('portfolio.projects');
Route::get('/portfolio/projetos/criar', [PortfolioController::class, 'create'])->name('portfolio.projects.create');
Route::post('/portfolio/projetos', [PortfolioController::class, 'store'])->name('portfolio.projects.store');
Route::get('/portfolio/projetos/{project}/editar', [PortfolioController::class, 'edit'])->name('portfolio.projects.edit');
Route::put('/portfolio/projetos/{project}', [PortfolioController::class, 'update'])->name('portfolio.projects.update');
Route::delete('/portfolio/projetos/{project}', [PortfolioController::class, 'destroy'])->name('portfolio.projects.destroy');

// Categorias do Portfólio
Route::get('/portfolio/categorias', [PortfolioController::class, 'categories'])->name('portfolio.categories');
Route::post('/portfolio/categorias', [PortfolioController::class, 'storeCategory'])->name('portfolio.categories.store');
Route::put('/portfolio/categorias/{category}', [PortfolioController::class, 'updateCategory'])->name('portfolio.categories.update');
Route::delete('/portfolio/categorias/{category}', [PortfolioController::class, 'destroyCategory'])->name('portfolio.categories.destroy');

// Mensagens de Contato
Route::get('/contatos', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/contatos/{contact}', [ContactsController::class, 'show'])->name('contacts.show');
Route::post('/contatos/{contact}/responder', [ContactsController::class, 'reply'])->name('contacts.reply');
Route::delete('/contatos/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');

// Blog
Route::get('/blog/posts', [BlogController::class, 'index'])->name('blog.posts');
Route::get('/blog/posts/criar', [BlogController::class, 'create'])->name('blog.posts.create');
Route::post('/blog/posts', [BlogController::class, 'store'])->name('blog.posts.store');
Route::get('/blog/posts/{post}/editar', [BlogController::class, 'edit'])->name('blog.posts.edit');
Route::put('/blog/posts/{post}', [BlogController::class, 'update'])->name('blog.posts.update');
Route::delete('/blog/posts/{post}', [BlogController::class, 'destroy'])->name('blog.posts.destroy');

// Biblioteca de Mídia
Route::get('/media/biblioteca', [MediaLibraryController::class, 'index'])->name('media.library');
Route::post('/media/upload', [MediaLibraryController::class, 'upload'])->name('media.upload');
Route::delete('/media/{media}', [MediaLibraryController::class, 'destroy'])->name('media.destroy');

// Performance do Site
Route::get('/performance', [SitePerformanceController::class, 'index'])->name('site.performance');
Route::post('/performance/scan', [SitePerformanceController::class, 'scan'])->name('performance.scan');

// SEO
Route::get('/seo', [SeoController::class, 'dashboard'])->name('seo.dashboard');
Route::get('/seo/keywords', [SeoController::class, 'keywords'])->name('seo.keywords');
Route::post('/seo/keywords', [SeoController::class, 'storeKeyword'])->name('seo.keywords.store');

// Segurança
Route::get('/seguranca', [SecurityController::class, 'overview'])->name('security.overview');
Route::get('/seguranca/logs', [SecurityController::class, 'logs'])->name('security.logs');
Route::post('/seguranca/scan', [SecurityController::class, 'scan'])->name('security.scan');

// Configurações
Route::get('/configuracoes/geral', [SettingsController::class, 'general'])->name('settings.general');
Route::put('/configuracoes/geral', [SettingsController::class, 'updateGeneral'])->name('settings.general.update');

// API Tokens
Route::get('/api/tokens', [ApiTokenController::class, 'index'])->name('api.tokens');
Route::post('/api/tokens', [ApiTokenController::class, 'store'])->name('api.tokens.store');
Route::put('/api/tokens/{token}', [ApiTokenController::class, 'update'])->name('api.tokens.update');
Route::delete('/api/tokens/{token}', [ApiTokenController::class, 'destroy'])->name('api.tokens.destroy');
});

Route::post('/visitor-tracking', [VisitorTrackingController::class, 'store'])->name('visitor.tracking.store');

require __DIR__.'/auth.php';
