<nav x-data="{ open: false, profileOpen: false }" class="bg-gray-900 border-b pt-2 pb-3 position-absolute zoom-in fixed-top border-gray-800">
    <!-- CSS para JetBrains Mono -->
  
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <div class="text-sky-400 font-bold text-xl">
                            <img src="{{ asset('images/logo.webp') }}" alt="App Logo" class="">
                        </div>

                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-0 sm:-my-px sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-4 py-2 text-white hover:text-white  jetbrains-mono {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-chart-line mr-2"></i>{{ __('Dashboard') }}
                    </x-nav-link>
                    
                    <x-nav-link href="#" class="px-4 py-2 text-gray-300 hover:text-white nav-item jetbrains-mono">
                        <i class="fas fa-code mr-2"></i>{{ __('Projects') }}
                    </x-nav-link>
                    
                    <x-nav-link href="#" class="px-4 py-2 text-gray-300 hover:text-white nav-item jetbrains-mono">
                        <i class="fas fa-terminal mr-2"></i>{{ __('Terminal') }}
                    </x-nav-link>
                    
                    <x-nav-link href="#" class="px-4 py-2 text-gray-300 hover:text-white nav-item jetbrains-mono">
                        <i class="fas fa-puzzle-piece mr-2"></i>{{ __('Components') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- GitHub Icon -->
                <a href="#" class="text-gray-400 hover:text-white px-3">
                    <i class="fab fa-github text-xl"></i>
                </a>
                
                <!-- Notification Bell -->
                <div class="relative px-3">
                    <button class="text-gray-400 hover:text-white">
                        <i class="fas fa-bell text-xl"></i>
                    </button>
                </div>
                
                <!-- Profile dropdown - usando Alpine.js -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="inline-flex items-center px-4   text-sm leading-4 font-medium rounded-md text-gray-300  hover:text-white focus:outline-none transition ease-in-out duration-150 jetbrains-mono">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-sky-500 flex items-center justify-center text-white font-semibold mr-2">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>{{ Auth::user()->name }}</div>
                        </div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg code-bg border border-gray-700 text-gray-300 jetbrains-mono z-50"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95">
                        <div class="py-1">
                            <div class="px-4 py-2 text-xs text-gray-500 border-b border-gray-700">
                                <span class="text-sky-400">user</span>@<span class="text-green-400">devdash</span>:~$
                            </div>
                            
                            <a href="{{ route('profile.edit') }}" class="block dropdown-item text-gray-300 hover:text-white px-4 py-2">
                                <i class="fas fa-user-circle mr-2"></i>{{ __('Profile') }}
                            </a>
                            
                            <a href="#" class="block dropdown-item text-gray-300 hover:text-white px-4 py-2">
                                <i class="fas fa-cog mr-2"></i>{{ __('Settings') }}
                            </a>
                            
                            <a href="#" class="block dropdown-item text-gray-300 hover:text-white px-4 py-2">
                                <i class="fas fa-code-branch mr-2"></i>{{ __('My Repositories') }}
                            </a>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="block dropdown-item text-gray-300 hover:text-white border-t border-gray-700 px-4 py-2">
                                    <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-900">
        <div class="pt-4 pb-3 space-y-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-300 jetbrains-mono hover:text-white">
                <i class="fas fa-chart-line mr-2"></i>{{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" 
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-300 jetbrains-mono hover:text-white">
                <i class="fas fa-code mr-2"></i>{{ __('Projects') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" 
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-300 jetbrains-mono hover:text-white">
                <i class="fas fa-terminal mr-2"></i>{{ __('Terminal') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" 
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-300 jetbrains-mono hover:text-white">
                <i class="fas fa-puzzle-piece mr-2"></i>{{ __('Components') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4 flex items-center">
                <div class="h-10 w-10 rounded-full bg-sky-500 flex items-center justify-center text-white font-semibold mr-3">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium text-base text-white jetbrains-mono">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400 jetbrains-mono">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-300 jetbrains-mono hover:text-white">
                    <i class="fas fa-user-circle mr-2"></i>{{ __('Profile') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link href="#"
                    class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-300 jetbrains-mono hover:text-white">
                    <i class="fas fa-cog mr-2"></i>{{ __('Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-300 jetbrains-mono hover:text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>



<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- Alpine.js (para interatividade) -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>