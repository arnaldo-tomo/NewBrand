<x-app-layout>



    <!-- Dashboard Page -->
<div class="bg-gray-900 min-h-screen">
    <!-- Navbar já implementado anteriormente -->
    <div class="px-[12%] pt-3" >
        <h2 class="font-semibold text-xl text-gray-200 ">
            Dashboard
        </h2>
        <p class="mt-1 text-sm text-zinc-400">Análise detalhada dos visitantes.</p>
    </div>
    <!-- Main Content -->
    <div class="px-6 py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-white text-2xl font-medium">Análise de Visitantes</h1>
                <div class="flex space-x-4">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="bg-gray-800 px-4 py-2 rounded-md text-gray-200 flex items-center space-x-2 hover:bg-gray-700 transition-colors">
                            <span>Últimos 30 dias</span>
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-40">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Hoje</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Últimos 7 dias</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Últimos 30 dias</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Este mês</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Personalizado</a>
                        </div>
                    </div>
                    <button class="bg-sky-500 hover:bg-sky-600 px-4 py-2 rounded-md text-white transition-colors">
                        Exportar dados
                    </button>
                </div>
            </div>

            <!-- Métricas Principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total de Visitantes -->
                <div class="bg-gray-800 rounded-lg p-6 border-l-4 border-sky-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Total de Visitantes</p>
                            <h3 class="text-white text-2xl font-bold mt-1">{{ $totalVisitantes }}</h3>
                            <p class="text-gray-400 text-xs mt-2">Desde o início</p>
                        </div>
                        <div class="bg-gray-700/50 p-3 rounded-lg">
                            <svg class="h-6 w-6 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>


                <!-- Visitantes Hoje -->
                <div class="bg-gray-800 rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Visitantes Hoje</p>
                            <h3 class="text-white text-2xl font-bold mt-1">{{ $visitantesHoje }}</h3>
                            @if($visitantesOntem > 0)
                                @php $percentChange = (($visitantesHoje - $visitantesOntem) / $visitantesOntem) * 100; @endphp
                                <p class="text-xs mt-2 {{ $percentChange >= 0 ? 'text-green-400' : 'text-red-400' }}">
                                    {{ $percentChange >= 0 ? '+' : '' }}{{ number_format($percentChange, 1) }}% vs. ontem
                                </p>
                            @else
                                <p class="text-gray-400 text-xs mt-2">Sem dados de ontem</p>
                            @endif
                        </div>
                        <div class="bg-gray-700/50 p-3 rounded-lg">
                            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Visitantes Esta Semana -->
                <div class="bg-gray-800 rounded-lg p-6 border-l-4 border-purple-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Esta Semana</p>
                            <h3 class="text-white text-2xl font-bold mt-1">{{ $visitantesEstaSemana }}</h3>
                            <p class="text-gray-400 text-xs mt-2">Média: {{ number_format($visitantesEstaSemana / 7, 1) }}/dia</p>
                        </div>
                        <div class="bg-gray-700/50 p-3 rounded-lg">
                            <svg class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Velocidade Média de Conexão -->
                <div class="bg-gray-800 rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Velocidade Média</p>
                            <h3 class="text-white text-2xl font-bold mt-1">{{ number_format($velocidadesConexao, 1) }} Mbps</h3>
                            <p class="text-gray-400 text-xs mt-2">Baseado em todos os visitantes</p>
                        </div>
                        <div class="bg-gray-700/50 p-3 rounded-lg">
                            <svg class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos-->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Gráfico de Visitantes por Dia -->
                <div class="bg-gray-800 rounded-lg p-6 lg:col-span-2">
                    <h3 class="text-white text-lg font-medium mb-4">Visitantes nos Últimos 30 Dias</h3>
                    <div class="h-80 w-full">
                        <canvas id="visitorsChart"></canvas>
                    </div>
                </div>

                <!-- Gráfico de Visitantes por Hora -->
                <div class="bg-gray-800 rounded-lg p-6">
                    <h3 class="text-white text-lg font-medium mb-4">Visitantes por Hora do Dia</h3>
                    <div class="h-80 w-full">
                        <canvas id="hourlyVisitorsChart"></canvas>
                    </div>
                </div>
            </div>


            <!-- Análise de Dispositivos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Dispositivos -->
                <div class="bg-gray-800 rounded-lg p-6">
                    <h3 class="text-white text-lg font-medium mb-6">Dispositivos</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Tipos de Dispositivo -->
                        <div>
                            <h4 class="text-gray-400 text-sm mb-4">Tipo de Dispositivo</h4>
                            <div class="space-y-4">
                                @foreach($dispositivosPorTipo as $dispositivo)
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-300 text-sm">{{ $dispositivo->device_type ?: 'Desconhecido' }}</span>
                                        <span class="text-gray-400 text-sm">{{ number_format(($dispositivo->total / $totalVisitantes) * 100, 1) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="bg-sky-500 h-2 rounded-full" style="width: {{ ($dispositivo->total / $totalVisitantes) * 100 }}%"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Sistemas Operacionais -->
                        <div>
                            <h4 class="text-gray-400 text-sm mb-4">Sistemas Operacionais</h4>
                            <div class="space-y-4">
                                @foreach($sistemaOperacional as $os)
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-300 text-sm">{{ $os->os ?: 'Desconhecido' }}</span>
                                        <span class="text-gray-400 text-sm">{{ number_format(($os->total / $totalVisitantes) * 100, 1) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="bg-purple-500 h-2 rounded-full" style="width: {{ ($os->total / $totalVisitantes) * 100 }}%"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navegadores -->
                <div class="bg-gray-800 rounded-lg p-6">
                    <h3 class="text-white text-lg font-medium mb-4">Navegadores</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <!--<div class="col-span-2 h-48">-->
                        <!--    <canvas id="browsersChart"></canvas>-->
                        <!--</div>-->
                        <div class="col-span-2">
                            <h4 class="text-gray-400 text-sm mb-4">Top Navegadores</h4>
                            <div class="grid grid-cols-2 gap-1">
                                @foreach($navegadores->take(4) as $navegador)
                                <div class="flex items-center p-3 bg-gray-700/50 rounded-lg">
                                    <div class="p-2 mr-3 rounded-md bg-gray-600">
                                        @if(strtolower($navegador->browser) == 'chrome')
                                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 0C8.21 0 4.831 1.757 2.632 4.501l3.953 6.848A5.454 5.454 0 0 1 12 6.545h10.691A12 12 0 0 0 12 0zM1.931 5.47A11.943 11.943 0 0 0 0 12c0 6.012 4.42 10.991 10.189 11.864l3.953-6.847a5.45 5.45 0 0 1-6.865-2.29zm13.342 2.166a5.446 5.446 0 0 1 1.45 7.09l.002.003h-.002l-5.344 9.257c.206.01.413.016.621.016 6.627 0 12-5.373 12-12 0-1.54-.29-3.011-.818-4.366zM12 16.364a4.364 4.364 0 1 1 0-8.728 4.364 4.364 0 0 1 0 8.728Z" />
                                            </svg>
                                        @elseif(strtolower($navegador->browser) == 'firefox')
                                            <svg class="h-5 w-5 text-orange-400" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 0C5.376 0 0 5.376 0 12s5.376 12 12 12 12-5.376 12-12S18.624 0 12 0zm0 2.163c3.94 0 7.312 2.36 8.804 5.751.093.213.179.427.256.646a9.845 9.845 0 0 1 .75 3.772c0 1.401-.27 2.765-.83 4.074-1.091 2.952-3.468 5.146-6.441 5.885A9.829 9.829 0 0 1 12 21.837c-.74 0-1.455-.087-2.147-.243a9.867 9.867 0 0 1-6.136-4.043 9.806 9.806 0 0 1-.928-1.762A9.661 9.661 0 0 1 2.163 12c0-5.431 4.406-9.837 9.837-9.837z" />
                                            </svg>
                                        @elseif(strtolower($navegador->browser) == 'safari')
                                            <svg class="h-5 w-5 text-blue-400" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2zm-5.5 6.5l7 3.5-7 3.5v-7z" />
                                            </svg>
                                        @elseif(strtolower($navegador->browser) == 'edge')
                                            <svg class="h-5 w-5 text-sky-400" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 0C5.372 0 0 5.372 0 12c0 6.627 5.372 12 12 12s12-5.373 12-12c0-6.628-5.372-12-12-12zm0 5.5c3.312 0 6.387 1.568 8.332 4.12h-2.698C16.335 8.37 14.275 7.5 12 7.5c-2.325 0-4.43.918-5.971 2.41L12 14.878V17.5h-7v-5c0-3.866 3.134-7 7-7z" />
                                            </svg>
                                        @else
                                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-gray-300 text-sm font-medium">{{ $navegador->browser }}</p>
                                        <p class="text-gray-400 text-xs">{{ number_format(($navegador->total / $totalVisitantes) * 100, 1) }}%</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Localizações e Recursos -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Localizações -->
                <div class="bg-gray-800 rounded-lg p-6 lg:col-span-2">
                    <h3 class="text-white text-lg font-medium mb-4">Top Localizações</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">País</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Visitantes</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Porcentagem</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($localizacoes as $localizacao)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="text-gray-300">{{ $localizacao->location ?: 'Desconhecido' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-gray-300">
                                        {{ $localizacao->total }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-full bg-gray-700 rounded-full h-2 mr-2 max-w-[100px]">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ ($localizacao->total / $totalVisitantes) * 100 }}%"></div>
                                            </div>
                                            <span class="text-gray-400 text-sm">{{ number_format(($localizacao->total / $totalVisitantes) * 100, 1) }}%</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recursos do Navegador -->
                <div class="bg-gray-800 rounded-lg p-6">
                    <h3 class="text-white text-lg font-medium mb-4">Recursos do Navegador</h3>
                    <div class="space-y-4">
                        @foreach($recursosNavegador as $recurso => $total)
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-300 text-sm">{{ $recurso }}</span>
                                <span class="text-gray-400 text-sm">{{ number_format(($total / $totalVisitantes) * 100, 1) }}%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ ($total / $totalVisitantes) * 100 }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Últimos Visitantes -->
 <!-- Adicione esta seção na sua página de dashboard -->

<!-- Últimos Visitantes com Dados Avançados -->
<!-- Substitua sua tabela de últimos visitantes por esta versão otimizada -->

<!-- Últimos Visitantes com Layout Otimizado -->
<!-- Últimos Visitantes com Paginação -->
<div class="bg-gray-800 rounded-lg p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-white text-lg font-medium">Últimos Visitantes</h3>
        <div class="flex items-center space-x-4">
            <span class="text-gray-400 text-sm">{{ $ultimosVisitantes->count() }} de {{ $totalVisitantes }} visitantes</span>
            <a href="#" class="text-sky-400 text-sm hover:underline">Ver todos</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                            <span>IP Address</span>
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Localização</span>
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Sistema</span>
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Página</span>
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Data/Hora</span>
                        </div>
                    </th>
                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-400 uppercase tracking-wider">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>Detalhes</span>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($ultimosVisitantes as $visitante)
                <tr class="hover:bg-gray-750 transition-colors duration-200">
                    <td class="px-4 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-gray-300 font-mono text-sm">{{ $visitante->ip_address }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 bg-blue-500 bg-opacity-20 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-300 text-sm">{{ $visitante->location ?: 'Desconhecida' }}</p>
                                <p class="text-gray-500 text-xs">{{ $visitante->isp ?: 'ISP não identificado' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center space-x-2">
                            @if(str_contains(strtolower($visitante->os_info ?: ''), 'windows'))
                                <div class="w-6 h-6 bg-blue-500 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M0 3.5L10 2v8.5H0V3.5zm11 0L24 0v12H11V3.5zM0 12.5h10V24L0 22v-9.5zm11 0h13v12L11 22v-9.5z"/>
                                    </svg>
                                </div>
                            @elseif(str_contains(strtolower($visitante->os_info ?: ''), 'mac'))
                                <div class="w-6 h-6 bg-gray-500 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.017 0C8.396 0 4.544.719 1.994 3.124c-.43.407-.683.978-.683 1.575 0 .695.375 1.341.975 1.684 3.171 1.817 7.83 1.945 10.713-1.084 2.883-3.029 2.88-7.577-.002-10.299C12.398.268 12.017 0 12.017 0z"/>
                                    </svg>
                                </div>
                            @elseif(str_contains(strtolower($visitante->os_info ?: ''), 'android'))
                                <div class="w-6 h-6 bg-green-500 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.5 4.5c-.28 0-.5.22-.5.5s.22.5.5.5.5-.22.5-.5-.22-.5-.5-.5zM6.5 4.5c-.28 0-.5.22-.5.5s.22.5.5.5.5-.22.5-.5-.22-.5-.5-.5zM19.03 7.39l2.75-4.81c.1-.18.04-.41-.14-.51-.18-.1-.41-.04-.51.14l-2.75 4.81c-.89-.52-1.9-.94-3.01-1.23-.61-.16-1.25-.25-1.91-.25-.66 0-1.3.09-1.91.25-1.11.29-2.12.71-3.01 1.23L5.69 2.21c-.1-.18-.33-.24-.51-.14-.18.1-.24.33-.14.51l2.75 4.81c-1.89 1.13-3.18 3.05-3.43 5.27H24c-.25-2.22-1.54-4.14-3.43-5.27z"/>
                                    </svg>
                                </div>
                            @else
                                <div class="w-6 h-6 bg-purple-500 bg-opacity-20 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <p class="text-gray-300 text-sm">{{ $visitante->os_info ?: 'Desconhecido' }}</p>
                                <p class="text-gray-500 text-xs">{{ $visitante->device_type ?: 'Dispositivo não identificado' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 bg-indigo-500 bg-opacity-20 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-gray-300 text-sm truncate" title="{{ $visitante->page_url }}">
                                    {{ $visitante->page_url ?: 'N/A' }}
                                </p>
                                <p class="text-gray-500 text-xs truncate" title="{{ $visitante->referrer_url }}">
                                    {{ $visitante->referrer_url ? (parse_url($visitante->referrer_url, PHP_URL_HOST) ?: 'Direto') : 'Direto' }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 bg-yellow-500 bg-opacity-20 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-300 text-sm">{{ $visitante->created_at->format('d/m/Y') }}</p>
                                <p class="text-gray-500 text-xs">{{ $visitante->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <button onclick="openModal{{ $visitante->id }}()"
                                class="group relative inline-flex items-center justify-center w-8 h-8 bg-sky-500 bg-opacity-20 rounded-lg hover:bg-sky-500 hover:bg-opacity-30 transition-all duration-200 hover:scale-110">
                            <svg class="w-4 h-4 text-sky-400 group-hover:text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <div class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap">
                                Ver detalhes
                            </div>
                        </button>
                    </td>
                </tr>

                <!-- Modal específico para este visitante -->
                <div id="modal{{ $visitante->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="bg-gray-800 rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden shadow-2xl">
                            <!-- Header -->
                            <div class="bg-gradient-to-r from-sky-600 to-sky-700 px-6 py-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-xl font-semibold text-white">Detalhes do Visitante</h2>
                                            <p class="text-sky-100 text-sm opacity-90">IP: {{ $visitante->ip_address }}</p>
                                        </div>
                                    </div>
                                    <button onclick="closeModal{{ $visitante->id }}()" class="text-white hover:text-sky-200 transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Conteúdo -->
                            <div class="p-6 overflow-y-auto max-h-[calc(90vh-120px)]">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <!-- Informações de Localização -->
                                    <div class="bg-gray-700 rounded-xl p-5 space-y-4">
                                        <div class="flex items-center space-x-3 mb-4">
                                            <div class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-white">Localização & Rede</h3>
                                        </div>

                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">IP Address</span>
                                                <span class="text-white font-mono bg-gray-600 px-2 py-1 rounded">{{ $visitante->ip_address }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Localização</span>
                                                <span class="text-white">{{ $visitante->location ?: 'N/A' }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Provedor (ISP)</span>
                                                <span class="text-white">{{ $visitante->isp ?: 'N/A' }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Tipo de Conexão</span>
                                                <span class="text-white">{{ $visitante->connection_type ?: 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Informações do Dispositivo -->
                                    <div class="bg-gray-700 rounded-xl p-5 space-y-4">
                                        <div class="flex items-center space-x-3 mb-4">
                                            <div class="w-8 h-8 bg-blue-500 bg-opacity-20 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-white">Dispositivo</h3>
                                        </div>

                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Tipo</span>
                                                <span class="text-white">{{ $visitante->device_type ?: 'N/A' }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Sistema Operacional</span>
                                                <span class="text-white">{{ $visitante->os_info ?: 'N/A' }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Navegador</span>
                                                <span class="text-white">{{ $visitante->browser_info ?: 'N/A' }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Resolução da Tela</span>
                                                <span class="text-white font-mono bg-gray-600 px-2 py-1 rounded">{{ $visitante->screen_resolution ?: 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Informações de Navegação -->
                                    <div class="bg-gray-700 rounded-xl p-5 space-y-4">
                                        <div class="flex items-center space-x-3 mb-4">
                                            <div class="w-8 h-8 bg-purple-500 bg-opacity-20 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-white">Navegação</h3>
                                        </div>

                                        <div class="space-y-3">
                                            <div>
                                                <span class="text-gray-400 block mb-1">Página Visitada</span>
                                                <span class="text-white bg-gray-600 px-3 py-2 rounded-lg block font-mono text-sm">{{ $visitante->page_url ?: 'N/A' }}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-400 block mb-1">Origem (Referrer)</span>
                                                <span class="text-white bg-gray-600 px-3 py-2 rounded-lg block font-mono text-sm">{{ $visitante->referrer_url ?: 'Direto' }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-gray-400">Tempo de Visita</span>
                                                <span class="text-white">{{ $visitante->visit_time ?: 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Capacidades do Dispositivo -->
                                    <div class="bg-gray-700 rounded-xl p-5 space-y-4">
                                        <div class="flex items-center space-x-3 mb-4">
                                            <div class="w-8 h-8 bg-yellow-500 bg-opacity-20 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-white">Capacidades Técnicas</h3>
                                        </div>

                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 {{ $visitante->webgl_support ? 'bg-green-400' : 'bg-red-400' }} rounded-full"></div>
                                                <span class="text-gray-300 text-sm">WebGL</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 {{ $visitante->canvas_support ? 'bg-green-400' : 'bg-red-400' }} rounded-full"></div>
                                                <span class="text-gray-300 text-sm">Canvas</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 {{ $visitante->webrtc_support ? 'bg-green-400' : 'bg-red-400' }} rounded-full"></div>
                                                <span class="text-gray-300 text-sm">WebRTC</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 {{ $visitante->touch_support ? 'bg-green-400' : 'bg-red-400' }} rounded-full"></div>
                                                <span class="text-gray-300 text-sm">Touch Support</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 {{ $visitante->geolocation_support ? 'bg-green-400' : 'bg-red-400' }} rounded-full"></div>
                                                <span class="text-gray-300 text-sm">Geolocation</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-2 h-2 {{ $visitante->notifications_support ? 'bg-green-400' : 'bg-red-400' }} rounded-full"></div>
                                                <span class="text-gray-300 text-sm">Notifications</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Informações Adicionais -->
                                    <div class="bg-gray-700 rounded-xl p-5 space-y-4 md:col-span-2">
                                        <div class="flex items-center space-x-3 mb-4">
                                            <div class="w-8 h-8 bg-red-500 bg-opacity-20 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-white">Informações Adicionais</h3>
                                        </div>

                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-white">{{ $visitante->color_depth ?: 'N/A' }}</div>
                                                <div class="text-gray-400 text-sm">Profundidade de Cor</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-white">{{ $visitante->pixel_ratio ?: 'N/A' }}</div>
                                                <div class="text-gray-400 text-sm">Pixel Ratio</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-white">{{ $visitante->device_memory ?: 'N/A' }}</div>
                                                <div class="text-gray-400 text-sm">Memória (GB)</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-white">{{ $visitante->created_at->format('d/m/Y') }}</div>
                                                <div class="text-gray-400 text-sm">Data da Visita</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                function openModal{{ $visitante->id }}() {
                    document.getElementById('modal{{ $visitante->id }}').classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }

                function closeModal{{ $visitante->id }}() {
                    document.getElementById('modal{{ $visitante->id }}').classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
                </script>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-12 text-center">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class="text-gray-400 text-lg font-medium">Nenhum visitante encontrado</h3>
                                <p class="text-gray-500 text-sm">Aguarde por novas visitas para começar a ver dados aqui.</p>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- Paginação Manual Simples (já que não há paginação no backend) -->
    <div class="mt-6 flex items-center justify-between border-t border-gray-700 pt-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-700 border border-gray-600 cursor-default rounded-md">
                Anterior
            </button>
            <button class="ml-3 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-700 border border-gray-600 cursor-default rounded-md">
                Próximo
            </button>
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-400">
                    Mostrando os
                    <span class="font-medium text-white">{{ $ultimosVisitantes->count() }}</span>
                    visitantes mais recentes de
                    <span class="font-medium text-white">{{ $totalVisitantes }}</span>
                    total
                </p>
            </div>
            <div>
                <a href="#" class="px-4 py-2 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition-colors text-sm">
                    Ver todos os visitantes
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Fechar modal com ESC -->
<script>
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Fechar todos os modais abertos
        const modals = document.querySelectorAll('[id^="modal"]');
        modals.forEach(modal => {
            modal.classList.add('hidden');
        });
        document.body.style.overflow = 'auto';
    }
});
</script>


        </div>
    </div>
</div>

<!-- Scripts para os gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== Gráfico de Visitantes por Dia =====
    const visitorsData = {
        labels: visitantesPorDia.map(item => item.data),
        datasets: [{
            label: 'Visitantes',
            data: visitantesPorDia.map(item => item.total),
            backgroundColor: 'rgba(14, 165, 233, 0.2)',
            borderColor: 'rgba(14, 165, 233, 1)',
            borderWidth: 2,
            tension: 0.4,
            fill: true,
            pointBackgroundColor: 'rgba(14, 165, 233, 1)',
            pointBorderColor: '#fff',
            pointBorderWidth: 1,
            pointRadius: 3,
            pointHoverRadius: 5
        }]
    };

    const visitorsConfig = {
        type: 'line',
        data: visitorsData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        color: 'rgba(75, 85, 99, 0.2)'
                    },
                    ticks: {
                        color: 'rgba(156, 163, 175, 1)',
                        maxRotation: 45,
                        minRotation: 45
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(75, 85, 99, 0.2)'
                    },
                    ticks: {
                        color: 'rgba(156, 163, 175, 1)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#e5e7eb',
                    borderColor: '#374151',
                    borderWidth: 1,
                    padding: 10,
                    displayColors: false,
                    callbacks: {
                        title: function(context) {
                            return 'Data: ' + context[0].label;
                        },
                        label: function(context) {
                            return 'Visitantes: ' + context.raw;
                        }
                    }
                }
            }
        }
    };

    // Renderizar o gráfico de visitantes por dia
    new Chart(
        document.getElementById('visitorsChart'),
        visitorsConfig
    );

    // ===== Gráfico de Visitantes por Hora =====
    const hourlyData = {
        labels: visitantesPorHora.map(item => item.hora + 'h'),
        datasets: [{
            label: 'Visitantes',
            data: visitantesPorHora.map(item => item.total),
            backgroundColor: 'rgba(139, 92, 246, 0.7)',
            borderWidth: 0,
            borderRadius: 4
        }]
    };

    const hourlyConfig = {
        type: 'bar',
        data: hourlyData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: 'rgba(156, 163, 175, 1)'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(75, 85, 99, 0.2)'
                    },
                    ticks: {
                        color: 'rgba(156, 163, 175, 1)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#e5e7eb',
                    borderColor: '#374151',
                    borderWidth: 1,
                    padding: 10,
                    displayColors: false
                }
            }
        }
    };

    // Renderizar o gráfico de visitantes por hora
    new Chart(
        document.getElementById('hourlyVisitorsChart'),
        hourlyConfig
    );

    // ===== Gráfico de Navegadores =====
    const browsersData = {
        labels: navegadores.map(item => item.browser),
        datasets: [{
            data: navegadores.map(item => item.total),
            backgroundColor: [
                'rgba(239, 68, 68, 0.8)',   // Vermelho (Chrome)
                'rgba(16, 185, 129, 0.8)',  // Verde (Firefox)
                'rgba(59, 130, 246, 0.8)',  // Azul (Safari)
                'rgba(217, 119, 6, 0.8)',   // Âmbar (Edge)
                'rgba(139, 92, 246, 0.8)'   // Roxo (Outros)
            ],
            borderColor: 'rgba(17, 24, 39, 1)',
            borderWidth: 1,
            hoverOffset: 5
        }]
    };

    const browsersConfig = {
        type: 'doughnut',
        data: browsersData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: 'rgba(156, 163, 175, 1)',
                        padding: 10,
                        font: {
                            size: 11
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#e5e7eb',
                    borderColor: '#374151',
                    borderWidth: 1,
                    padding: 10,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((sum, value) => sum + value, 0);
                            const percentage = Math.round((context.raw / total) * 100);
                            return context.label + ': ' + context.raw + ' (' + percentage + '%)';
                        }
                    }
                }
            },
            cutout: '65%'
        }
    };

    // Renderizar o gráfico de navegadores
    new Chart(
        document.getElementById('browsersChart'),
        browsersConfig
    );

    // ===== Gráfico de Dispositivos =====
    const deviceData = {
        labels: dispositivosPorTipo.map(item => item.device_type),
        datasets: [{
            data: dispositivosPorTipo.map(item => item.total),
            backgroundColor: [
                'rgba(14, 165, 233, 0.8)',  // Azul (Desktop)
                'rgba(245, 158, 11, 0.8)',  // Amarelo (Mobile)
                'rgba(168, 85, 247, 0.8)'   // Roxo (Tablet)
            ],
            borderColor: 'rgba(17, 24, 39, 1)',
            borderWidth: 1
        }]
    };

    const deviceConfig = {
        type: 'pie',
        data: deviceData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: 'rgba(156, 163, 175, 1)',
                        padding: 15,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#e5e7eb',
                    borderColor: '#374151',
                    borderWidth: 1,
                    padding: 10
                }
            }
        }
    };

    // Renderizar o gráfico de dispositivos (se existir o elemento no DOM)
    const deviceChartElement = document.getElementById('deviceChart');
    if (deviceChartElement) {
        new Chart(deviceChartElement, deviceConfig);
    }

    // ===== Atualização Automática =====
    // Função para atualizar contadores
    function updateCounters() {
        const counterElements = document.querySelectorAll('[data-counter]');
        counterElements.forEach(element => {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 1500;
            const increment = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        });
    }

    // Iniciar contadores
    updateCounters();

    // Configurar atualização periódica (a cada 5 minutos)
    setInterval(function() {
        fetchDashboardData();
    }, 300000); // 5 minutos

    // Função para buscar dados atualizados
    function fetchDashboardData() {
        fetch('/api/dashboard/stats')
            .then(response => response.json())
            .then(data => {
                // Atualizar dados e redesenhar gráficos
                // Implementar conforme necessário
                console.log('Dados atualizados:', data);
            })
            .catch(error => {
                console.error('Erro ao atualizar dados:', error);
            });
    }
});
</script>

<!-- Depois incluir o script do gráfico -->
<script src="{{ asset('js/dashboard.js') }}"></script>
</x-app-layout>
