<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen antialiased bg-white">
        <div class="flex flex-col items-center justify-center gap-6 p-6 bg-background min-h-svh md:p-10">
            <div class="flex flex-col w-full max-w-sm gap-2">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flex items-center justify-center w-20 mb-1 rounded-md">
                        {{-- <x-app-logo-icon class="text-black fill-current size-9" /> --}}
                        <img src="{{ asset('images/favicon.png') }}" alt="{{ config('app.name', 'Laravel') }}" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
