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
use App\Http\Controllers\auth_otp;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\Project;


Route::get('/', function () {
    return redirect('/'.config('app.locale'));
});

// Rotas com prefixo de idioma
Route::group([  'prefix' => '{locale}', 'where' => ['locale' => 'en|pt'], // Define explicitamente os idiomas permitidos
     'middleware' => \App\Http\Middleware\SetLocale::class,
], function () {


    // Página inicial
    Route::get('/', function () {
        $projects = \App\Models\Project::where('is_active', true)
        ->orderBy('order')
        ->get();

        $education = \App\Models\Education::where('is_active', true)
        ->orderBy('order')
        ->get();

        $testimonials = \App\Models\Testimonial::where('is_active', true)
        ->orderBy('order')
        ->get();

        $skills = \App\Models\Skill::where('is_active', true)
        ->orderBy('order')
        ->get();

        // Medium blog posts (cached 2 hours)
        $posts = Cache::remember('medium_posts', 7200, function () {
            try {
                $response = Http::timeout(6)
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0 (compatible; portfolio-feed/1.0)'])
                    ->get('https://medium.com/feed/@arnaldotomo');
                if ($response->successful()) {
                    $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
                    $ns  = $xml->channel->item[0]?->getNamespaces(true) ?? [];
                    $items = [];
                    foreach ($xml->channel->item as $item) {
                        $html = '';
                        if (isset($ns['content'])) {
                            $c = $item->children($ns['content']);
                            $html = (string) ($c->encoded ?? '');
                        }
                        $excerpt = strip_tags($html);
                        $excerpt = preg_replace('/\s+/', ' ', trim($excerpt));
                        $items[] = [
                            'title'   => (string) $item->title,
                            'link'    => (string) $item->link,
                            'date'    => date('d M Y', strtotime((string) $item->pubDate)),
                            'excerpt' => mb_substr($excerpt, 0, 180) . '...',
                        ];
                    }
                    return $items; // all posts, carousel handles pagination
                }
            } catch (\Exception $e) {}
            return [];
        });

        // Packagist packages sorted by total downloads (cached 6 hours)
        $packages = Cache::remember('packagist_packages', 21600, function () {
            try {
                $response = Http::timeout(6)->get('https://packagist.org/users/arnaldo-tomo/packages.json');
                if ($response->successful()) {
                    $packages = $response->json('packages', []);
                    // Fetch download stats for each package
                    foreach ($packages as &$pkg) {
                        try {
                            $stats = Http::timeout(5)->get('https://packagist.org/packages/' . $pkg['name'] . '.json');
                            if ($stats->successful()) {
                                $data = $stats->json('package', []);
                                $pkg['downloads'] = $data['downloads']['total'] ?? 0;
                                $pkg['stars']     = $data['github_stars'] ?? 0;
                            }
                        } catch (\Exception $e) {
                            $pkg['downloads'] = 0;
                            $pkg['stars']     = 0;
                        }
                    }
                    unset($pkg);
                    // Sort by most downloaded
                    usort($packages, fn($a, $b) => ($b['downloads'] ?? 0) - ($a['downloads'] ?? 0));
                    return $packages;
                }
            } catch (\Exception $e) {}
            return [];
        });

        return view('welcome', compact('projects', 'education', 'testimonials', 'skills', 'posts', 'packages'));
    })->name('home');

    Route::get('/blog', function () {
        return view('blog');
    })->name('blog');

});

Route::get('me',function(){
    return view('verify-pin');
})->name('me');

Route::post('/verification.pin.verify', [auth_otp::class,'auth'])->name('verification.pin.verify');
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

// Educação
Volt::route('/portfolio/educacao', 'education.index')->name('education.index');

// Projetos
Volt::route('/portfolio/projects-manage', 'projects.index')->name('projects.manage');

// Testemunhos
Volt::route('/portfolio/testimonials-manage', 'testimonials.index')->name('testimonials.manage');

// Skills
Volt::route('/portfolio/skills-manage', 'skills.index')->name('skills.manage');

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

// Disponibilidade — toggle no dashboard
Route::post('/api/availability/toggle', function () {
    $current = \Illuminate\Support\Facades\DB::table('site_settings')->where('key', 'availability_status')->value('value');
    $new = $current === 'available' ? 'busy' : 'available';
    \Illuminate\Support\Facades\DB::table('site_settings')->updateOrInsert(
        ['key' => 'availability_status'],
        ['value' => $new, 'updated_at' => now()]
    );
    cache()->forget('availability_status');
    return response()->json(['status' => $new]);
})->middleware('auth')->name('api.availability.toggle');

Route::post('/visitor-tracking', [VisitorTrackingController::class, 'store'])->name('visitor.tracking.store');
Route::post('/contact/send', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

// Spotify
Route::get('/api/spotify/now-playing', [\App\Http\Controllers\SpotifyController::class, 'nowPlaying'])->name('spotify.now-playing');
Route::get('/spotify/auth', [\App\Http\Controllers\SpotifyController::class, 'auth'])->middleware('auth')->name('spotify.auth');
Route::get('/spotify/callback', [\App\Http\Controllers\SpotifyController::class, 'callback'])->name('spotify.callback');

// Proxy de geolocalização — evita bloqueios de CSP/CORS no browser
Route::get('/api/weather', function (\Illuminate\Http\Request $request) {
    $ip = $request->ip();

    // IPs locais → usar Beira como fallback
    $isLocal = in_array($ip, ['127.0.0.1', '::1']) || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.');

    $cacheKey = 'weather_' . ($isLocal ? 'beira' : md5($ip));

    $data = Cache::remember($cacheKey, 1800, function () use ($ip, $isLocal) {
        // 1. Obter coordenadas via IP
        if ($isLocal) {
            $lat = -19.84; $lon = 34.84; $city = 'Beira';
        } else {
            try {
                $geo = Http::timeout(4)->get("https://ipwho.is/{$ip}")->json();
                if (empty($geo['success'])) return null;
                $lat  = $geo['latitude'];
                $lon  = $geo['longitude'];
                $city = $geo['city'] ?? ($geo['country'] ?? '?');
            } catch (\Exception $e) { return null; }
        }

        // 2. Buscar tempo para essas coordenadas
        try {
            $w = Http::timeout(5)->get('https://api.open-meteo.com/v1/forecast', [
                'latitude'  => $lat,
                'longitude' => $lon,
                'current'   => 'temperature_2m,weather_code',
                'timezone'  => 'auto',
            ])->json();
        } catch (\Exception $e) { return null; }

        if (empty($w['current'])) return null;

        return [
            'temp' => round($w['current']['temperature_2m']),
            'code' => $w['current']['weather_code'],
            'city' => $city,
        ];
    });

    if (!$data) return response()->json(['ok' => false]);

    return response()->json(['ok' => true] + $data);
})->name('api.weather');

Route::get('/api/geo', function () {
    try {
        $data = Http::timeout(5)->get('https://ipwho.is/')->json();
        if (!empty($data['success'])) {
            return response()->json([
                'city'    => $data['city']    ?? '?',
                'country' => $data['country'] ?? '?',
                'isp'     => $data['connection']['isp'] ?? $data['connection']['org'] ?? '—',
            ]);
        }
    } catch (\Exception $e) {}
    return response()->json(['city' => '?', 'country' => '?', 'isp' => '—'], 200);
})->name('api.geo');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
