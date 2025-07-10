<x-layouts.app :title="__('Dashboard de Visitantes')">

    <!-- Cabeçalho do Dashboard -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">Dashboard de Visitantes</h1>
        <p class="mt-1 text-sm text-zinc-400">Análise detalhada dos visitantes do seu site</p>
    </div>

    <!-- Cards de Estatísticas Gerais -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-4 mb-6">
        <div class="rounded-xl border border-zinc-950 bg-zinc-950 p-4 shadow-sm animated-card dashboard-stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-zinc-500/20 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-zinc-400">Total de Visitantes</h2>
                    <p class="text-2xl font-bold text-white">{{ number_format($totalVisitantes) }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-600 bg-zinc-950 p-4 shadow-sm animated-card dashboard-stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-zinc-500/20 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-zinc-400">Visitantes Hoje</h2>
                    <p class="text-2xl font-bold text-white">{{ number_format($visitantesHoje) }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-600 bg-zinc-950 p-4 shadow-sm animated-card dashboard-stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-zinc-500/20 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-zinc-400">Visitantes Ontem</h2>
                    <p class="text-2xl font-bold text-white">{{ number_format($visitantesOntem) }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-600 bg-zinc-950 p-4 shadow-sm animated-card dashboard-stat-card">
            <div class="flex items-center">
                <div class="rounded-full bg-zinc-500/20 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-zinc-400">Esta Semana</h2>
                    <p class="text-2xl font-bold text-white">{{ number_format($visitantesEstaSemana) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos da Primeira Linha -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-3 mb-6">
        <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-sm chart-container">
            <h3 class="mb-4 text-lg font-medium text-white">Visitantes nos Últimos 30 Dias</h3>
            <div class="chart-container" style="position: relative; height: 100%; width: 100%;">
                <canvas id="visitantesChart"></canvas>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-sm chart-container">
            <h3 class="mb-4 text-lg font-medium text-white">Dispositivos</h3>
            <div class="h-64">
                <canvas id="dispositivosChart"></canvas>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-sm chart-container">
            <h3 class="mb-4 text-lg font-medium text-white">Navegadores</h3>
            <div class="h-64">
                <canvas id="navegadoresChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Linha de Detalhes -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-2 mb-6">
        <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-sm chart-container">
            <h3 class="mb-4 text-lg font-medium text-white">Sistemas Operacionais</h3>
            <div class="h-64">
                <canvas id="osChart"></canvas>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-sm chart-container">
            <h3 class="mb-4 text-lg font-medium text-white">Visitantes por Hora do Dia</h3>
            <div class="h-64">
                <canvas id="horasChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Linha de Detalhes Técnicos -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-3 mb-6">
        <!-- Resoluções de Tela -->
        <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-md">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h3 class="text-lg font-medium text-white">Resoluções de Tela</h3>
            </div>
            <div class="overflow-y-auto h-64 custom-scrollbar">
                <table class="min-w-full divide-y divide-zinc-600 data-table">
                    <thead class="bg-blue-500/90">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider rounded-tl-lg">Resolução</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Visitantes</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider rounded-tr-lg">%</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-600">
                        @forelse($resolucoes as $index => $resolucao)
                        <tr class="{{ $index % 2 == 0 ? 'bg-zinc-700' : 'bg-zinc-600' }} hover:bg-blue-900 transition-colors duration-200">
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-white flex items-center rounded-bl-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ $resolucao->screen_resolution }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-400">{{ number_format($resolucao->total) }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-400 rounded-br-lg">
                                <div class="w-full bg-zinc-600 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{ ($resolucao->total / max(1, $totalVisitantes)) * 100 }}%"></div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-zinc-900">
                            <td colspan="3" class="px-4 py-3 text-sm text-zinc-400 text-center rounded-b-lg">Nenhum dado disponível</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

     <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-md">
        <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="text-lg font-medium text-white">Idiomas</h3>
        </div>
        <div class="overflow-y-auto h-64 custom-scrollbar">
            <table class="min-w-full divide-y divide-zinc-600 data-table">
                <thead class="bg-blue-500/90">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider rounded-tl-lg">Idioma</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Visitantes</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider rounded-tr-lg">%</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-600">
                    @forelse($idiomas as $index => $idioma)
                    <tr class="{{ $index % 2 == 0 ? 'bg-zinc-700' : 'bg-zinc-600' }} hover:bg-blue-900 transition-colors duration-200">
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-white flex items-center rounded-bl-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $idioma->browser_language }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-400">{{ number_format($idioma->total) }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-zinc-400 rounded-br-lg">
                            <div class="w-full bg-zinc-600 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{ ($idioma->total / max(1, $totalVisitantes)) * 100 }}%"></div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-zinc-900">
                        <td colspan="3" class="px-4 py-3 text-sm text-zinc-400 text-center rounded-b-lg">Nenhum dado disponível</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

       <!-- Recursos do Navegador (mantido como estava) -->
    <div class="rounded-xl border border-zinc-600 bg-zinc-900 p-4 shadow-sm chart-container">
        <h3 class="mb-4 text-lg font-medium text-white">Recursos do Navegador</h3>
        <div class="h-64">
            <canvas id="recursosChart"></canvas>
        </div>
    </div>
    
    </div>
</x-layouts.app>