<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div 
        x-data="{ 
            email: '', 
            password: '', 
            showPassword: false,
            errorMessage: '',
            login() {
                // Simulação de login (substitua com lógica real)
                if (!this.email || !this.password) {
                    this.errorMessage = 'Por favor, preencha todos os campos.';
                    return;
                }
                
                // Lógica de login (ex: chamada de API)
                console.log('Tentativa de login', this.email);
                this.errorMessage = '';
                // Simular carregamento
                setTimeout(() => {
                    // Aqui você normalmente faria uma chamada de API
                    alert('Login simulado com sucesso!');
                }, 1000);
            }
        }" 
        class="w-full max-w-md"
    >
        <div class="p-8 space-y-6 bg-white shadow-2xl rounded-xl">
            <!-- Cabeçalho -->
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-primary-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h2 class="mb-2 text-3xl font-bold text-gray-800">Bem-vindo de volta</h2>
                <p class="text-gray-600">Faça login na sua conta</p>
            </div>

            <!-- Formulário de Login -->
            <form @submit.prevent="login()" class="space-y-4">
                <!-- Mensagem de Erro -->
                <template x-if="errorMessage">
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <span class="block sm:inline" x-text="errorMessage"></span>
                    </div>
                </template>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-bold text-gray-700">
                        Endereço de E-mail
                    </label>
                    <input 
                        type="email" 
                        id="email"
                        x-model="email"
                        required
                        placeholder="seu-email@exemplo.com"
                        class="w-full px-3 py-2 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                    >
                </div>

                <!-- Senha Input -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">
                        Senha
                    </label>
                    <div class="relative">
                        <input 
                            :type="showPassword ? 'text' : 'password'"
                            id="password"
                            x-model="password"
                            required
                            placeholder="Digite sua senha"
                            class="w-full px-3 py-2 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                        >
                        <button 
                            type="button" 
                            @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                        >
                            <svg x-show="!showPassword" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg x-show="showPassword" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Esqueceu a Senha -->
                    <div class="mt-2 text-right">
                        <a href="#" class="text-sm transition duration-300 text-primary-500 hover:text-primary-700">
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>

                <!-- Lembrar de mim -->
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember"
                        class="w-4 h-4 border-gray-300 rounded text-primary-500 focus:ring-primary-500"
                    >
                    <label for="remember" class="block ml-2 text-sm text-gray-900">
                        Lembrar de mim
                    </label>
                </div>

                <!-- Botão de Login -->
                <button 
                    type="submit"
                    class="w-full px-4 py-2 text-white transition duration-300 rounded-md bg-primary-500 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50"
                >
                    Entrar
                </button>
            </form>

            <!-- Link de Cadastro -->
            <div class="mt-4 text-sm text-center text-gray-600">
                Não tem uma conta? 
                <a href="#" class="transition duration-300 text-primary-500 hover:text-primary-700">
                    Cadastre-se
                </a>
            </div>
        </div>
    </div>
</body>
</html>