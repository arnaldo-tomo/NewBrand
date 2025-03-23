<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen antialiased bg-neutral-100">
        <div class="flex flex-col items-center justify-center gap-6 p-6 bg-muted min-h-svh md:p-10">
            <div class="flex flex-col w-full max-w-md gap-6">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flex items-center justify-center rounded-md h-9 w-9">
                        <img src="{{ asset('images/favicon.png') }}" alt="{{ config('app.name', 'Laravel') }}" />
                    </span>

                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <div class="flex flex-col gap-6">
                    <div class="bg-white border shadow-xs rounded-xl text-stone-800">
                        <div class="px-10 py-8">{{ $slot }}</div>
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
