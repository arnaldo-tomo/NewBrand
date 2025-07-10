<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="images/favicon.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&display=swap');
            
            body, .jetbrains-mono {
                font-family: 'JetBrains Mono', monospace;
            }
            
            .code-bg {
                background-color: #1E1E2E;
            }
            
            .nav-item {
                transition: all 0.2s ease;
                border-left: 3px solid transparent;
            }
            
            .nav-item:hover, .nav-item.active {
                border-left: 3px solid #0ea5e9;
                background-color: rgba(14, 165, 233, 0.1);
            }
            
            .dropdown-item {
                transition: all 0.2s ease;
            }
            
            .dropdown-item:hover {
                background-color: rgba(14, 165, 233, 0.1);
            }
            
            .tech-badge {
                background-color: #1a1a2e;
                border-radius: 6px;
                padding: 12px;
                transition: all 0.3s ease;
            }
            
            .tech-badge:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            }
            
            .skill-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                margin: 0 2px;
                display: inline-block;
            }
            
            .skill-dot-filled {
                background-color: #0ea5e9;
            }
            
            .skill-dot-empty {
                background-color: #374151;
            }
        </style>
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
