<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                <x-app-logo />
            </a>
            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('visitors.analytics')" :current="request()->routeIs('visitors.analytics')" wire:navigate>{{ __('Visitantes') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('portfolio.projects')" :current="request()->routeIs('portfolio.projects')" wire:navigate>{{ __('Projetos') }}</flux:navlist.item>
                    <flux:navlist.item icon="envelope" :href="route('contacts.index')" :current="request()->routeIs('contacts.index')" wire:navigate>{{ __('Mensagens') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Conteúdo')" class="grid">
                    <flux:navlist.item icon="document-text" :href="route('blog.posts')" :current="request()->routeIs('blog.posts')" wire:navigate>{{ __('Blog') }}</flux:navlist.item>
                    <flux:navlist.item icon="folder" :href="route('portfolio.categories')" :current="request()->routeIs('portfolio.categories')" wire:navigate>{{ __('Categorias') }}</flux:navlist.item>
                    <flux:navlist.item icon="photo" :href="route('media.library')" :current="request()->routeIs('media.library')" wire:navigate>{{ __('Mídia') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Performance')" class="grid">
                    <flux:navlist.item icon="chart-bar" :href="route('site.performance')" :current="request()->routeIs('site.performance')" wire:navigate>{{ __('Métricas') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('seo.dashboard')" :current="request()->routeIs('seo.dashboard')" wire:navigate>{{ __('SEO') }}</flux:navlist.item>
                    <flux:navlist.item icon="shield-check" :href="route('security.overview')" :current="request()->routeIs('security.overview')" wire:navigate>{{ __('Segurança') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Configurações')" class="grid">
                    <flux:navlist.item icon="user" :href="route('settings.profile')" :current="request()->routeIs('settings.profile')" wire:navigate>{{ __('Perfil') }}</flux:navlist.item>
                    <flux:navlist.item icon="cog" :href="route('settings.general')" :current="request()->routeIs('settings.general')" wire:navigate>{{ __('Geral') }}</flux:navlist.item>
                    <flux:navlist.item icon="key" :href="route('api.tokens')" :current="request()->routeIs('api.tokens')" wire:navigate>{{ __('API Keys') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
