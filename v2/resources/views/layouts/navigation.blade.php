<nav x-data="{ open: false, portfolioOpen: false }" class="bg-gray-900 border-b border-gray-800 fixed-top" style="position:fixed;top:0;left:0;right:0;z-index:1000;">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14 items-center">

            <!-- Left: Logo + Links -->
            <div class="flex items-center gap-1">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center mr-4">
                    <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="h-8">
                </a>

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="nav-link jetbrains-mono {{ request()->routeIs('dashboard') ? 'nav-link-active' : '' }}">
                    <i class="fas fa-chart-line mr-1.5 text-xs"></i>Dashboard
                </a>

                <!-- Portfolio Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false"
                            class="nav-link jetbrains-mono flex items-center gap-1
                                   {{ request()->routeIs('education.index','projects.manage','testimonials.manage','skills.manage') ? 'nav-link-active' : '' }}">
                        <i class="fas fa-layer-group mr-1.5 text-xs"></i>Portfolio
                        <svg class="h-3 w-3 ml-1 transition-transform" :class="{'rotate-180': open}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="absolute left-0 mt-1 w-52 rounded-lg shadow-xl bg-gray-800 border border-gray-700 py-1 z-50 jetbrains-mono">

                        <a href="{{ route('projects.manage') }}"
                           class="dropdown-link {{ request()->routeIs('projects.manage') ? 'dropdown-link-active' : '' }}">
                            <i class="fas fa-code w-4"></i>Projects
                        </a>
                        <a href="{{ route('education.index') }}"
                           class="dropdown-link {{ request()->routeIs('education.index') ? 'dropdown-link-active' : '' }}">
                            <i class="fas fa-graduation-cap w-4"></i>Education
                        </a>
                        <a href="{{ route('testimonials.manage') }}"
                           class="dropdown-link {{ request()->routeIs('testimonials.manage') ? 'dropdown-link-active' : '' }}">
                            <i class="fas fa-comment-dots w-4"></i>Testimonials
                        </a>
                        <a href="{{ route('skills.manage') }}"
                           class="dropdown-link {{ request()->routeIs('skills.manage') ? 'dropdown-link-active' : '' }}">
                            <i class="fas fa-tools w-4"></i>Skills
                        </a>
                    </div>
                </div>

                <!-- Ver Site -->
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" target="_blank"
                   class="nav-link jetbrains-mono">
                    <i class="fas fa-globe mr-1.5 text-xs"></i>Ver Site
                    <i class="fas fa-external-link-alt ml-1 text-xs opacity-50"></i>
                </a>

            </div>

            <!-- Right: GitHub + Bell + User -->
            <div class="flex items-center gap-2">

                <!-- GitHub -->
                <a href="https://github.com/arnaldotomo" target="_blank"
                   class="p-2 text-gray-400 hover:text-white rounded-lg hover:bg-gray-800 transition">
                    <i class="fab fa-github text-lg"></i>
                </a>

                <!-- Notifications -->
                <button class="p-2 text-gray-400 hover:text-white rounded-lg hover:bg-gray-800 transition relative">
                    <i class="fas fa-bell text-lg"></i>
                </button>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false"
                            class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition jetbrains-mono text-sm">
                        <div class="h-7 w-7 rounded-full bg-sky-500 flex items-center justify-center text-white font-bold text-xs">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="hidden md:block">{{ Auth::user()->name }}</span>
                        <svg class="h-3 w-3 transition-transform" :class="{'rotate-180': open}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="absolute right-0 mt-1 w-52 rounded-lg shadow-xl bg-gray-800 border border-gray-700 py-1 z-50 jetbrains-mono">

                        <div class="px-4 py-2 text-xs text-gray-500 border-b border-gray-700">
                            <span class="text-sky-400">{{ Auth::user()->name }}</span>
                            <div class="text-gray-600 truncate">{{ Auth::user()->email }}</div>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="dropdown-link">
                            <i class="fas fa-user-circle w-4"></i>Profile
                        </a>
                        <a href="{{ route('settings.profile') }}" class="dropdown-link">
                            <i class="fas fa-cog w-4"></i>Settings
                        </a>

                        <div class="border-t border-gray-700 mt-1 pt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="dropdown-link text-red-400 hover:text-red-300">
                                    <i class="fas fa-sign-out-alt w-4"></i>Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 text-gray-400 hover:text-white rounded-lg">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-gray-800 border-t border-gray-700 px-4 py-3 space-y-1 jetbrains-mono">
        <a href="{{ route('dashboard') }}" class="mobile-link {{ request()->routeIs('dashboard') ? 'mobile-link-active' : '' }}">
            <i class="fas fa-chart-line w-5"></i>Dashboard
        </a>
        <a href="{{ route('projects.manage') }}" class="mobile-link">
            <i class="fas fa-code w-5"></i>Projects
        </a>
        <a href="{{ route('education.index') }}" class="mobile-link">
            <i class="fas fa-graduation-cap w-5"></i>Education
        </a>
        <a href="{{ route('testimonials.manage') }}" class="mobile-link">
            <i class="fas fa-comment-dots w-5"></i>Testimonials
        </a>
        <a href="{{ route('skills.manage') }}" class="mobile-link">
            <i class="fas fa-tools w-5"></i>Skills
        </a>
        <div class="border-t border-gray-700 pt-3 mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                   class="mobile-link text-red-400">
                    <i class="fas fa-sign-out-alt w-5"></i>Log Out
                </a>
            </form>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        color: #9ca3af;
        transition: all 0.15s ease;
        white-space: nowrap;
    }
    .nav-link:hover {
        color: #fff;
        background-color: rgba(255,255,255,0.06);
    }
    .nav-link-active {
        color: #38bdf8;
        background-color: rgba(56,189,248,0.1);
    }
    .dropdown-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 16px;
        font-size: 0.8rem;
        color: #d1d5db;
        transition: all 0.15s ease;
    }
    .dropdown-link:hover {
        background-color: rgba(255,255,255,0.05);
        color: #fff;
    }
    .dropdown-link-active {
        color: #38bdf8;
        background-color: rgba(56,189,248,0.08);
    }
    .mobile-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        color: #d1d5db;
        transition: all 0.15s ease;
    }
    .mobile-link:hover { background-color: rgba(255,255,255,0.05); color: #fff; }
    .mobile-link-active { color: #38bdf8; background-color: rgba(56,189,248,0.08); }
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Alpine.js -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
