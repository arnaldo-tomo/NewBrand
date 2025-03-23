<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen antialiased bg-white">
        <div class="relative grid flex-col items-center justify-center px-8 h-dvh sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="relative flex-col hidden h-full p-10 text-white bg-muted lg:flex">
                <div class="absolute inset-0 bg-neutral-900"></div>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                    <span class="flex items-center justify-center w-10 h-10 rounded-md">
                        <img src="{{ asset('images/favicon.png') }}" alt="{{ config('app.name', 'Laravel') }}" />
                    </span>
                    {{ config('app.name', 'Laravel') }}
                </a>

                @php
                    [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
                @endphp

                <div class="relative z-20 mt-auto">
                    <blockquote class="space-y-2">
                        <flux:heading size="lg">&ldquo;{{ trim($message) }}&rdquo;</flux:heading>
                        <footer><flux:heading>{{ trim($author) }}</flux:heading></footer>
                    </blockquote>
                </div>
            </div>
            <div class="w-full lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex items-center justify-center rounded-md h-9 w-9">
                            <img src="{{ asset('images/favicon.png') }}" alt="{{ config('app.name', 'Laravel') }}" />
                        </span>

                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
