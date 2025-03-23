<x-layouts.app :title="__('Dashboard de Visitantes')">
    <!-- Cabeçalho do Dashboard -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard de Visitantes</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Análise detalhada dos visitantes do seu site</p>
    </div>

    <!-- Cards de Estatísticas Gerais -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-4 mb-6">
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <div class="flex items-center">
                <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total de Visitantes</h2>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalVisitantes) }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <div class="flex items-center">
                <div class="rounded-full bg-green-100 p-3 dark:bg-green-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Visitantes Hoje</h2>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($visitantesHoje) }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <div class="flex items-center">
                <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Visitantes Ontem</h2>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($visitantesOntem) }}</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <div class="flex items-center">
                <div class="rounded-full bg-yellow-100 p-3 dark:bg-yellow-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600 dark:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Esta Semana</h2>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($visitantesEstaSemana) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos da Primeira Linha -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-3 mb-6">
        <!-- Gráfico de Visitantes por Dia -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Visitantes nos Últimos 30 Dias</h3>
            <div class="h-64">
                <canvas id="visitantesChart"></canvas>
            </div>
        </div>

        <!-- Gráfico de Dispositivos -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Dispositivos</h3>
            <div class="h-64">
                <canvas id="dispositivosChart"></canvas>
            </div>
        </div>

        <!-- Gráfico de Navegadores -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Navegadores</h3>
            <div class="h-64">
                <canvas id="navegadoresChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Linha de Detalhes -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-2 mb-6">
        <!-- Sistemas Operacionais -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Sistemas Operacionais</h3>
            <div class="h-64">
                <canvas id="osChart"></canvas>
            </div>
        </div>

        <!-- Visitantes por Hora -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Visitantes por Hora do Dia</h3>
            <div class="h-64">
                <canvas id="horasChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Linha de Detalhes Técnicos -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-3 mb-6">
        <!-- Resoluções de Tela -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Resoluções de Tela</h3>
            <div class="overflow-y-auto h-64">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Resolução</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Visitantes</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">%</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($resolucoes as $resolucao)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $resolucao->screen_resolution }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ number_format($resolucao->total) }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ number_format(($resolucao->total / $totalVisitantes) * 100, 1) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Idiomas do Navegador -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Idiomas</h3>
            <div class="overflow-y-auto h-64">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Idioma</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Visitantes</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">%</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($idiomas as $idioma)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $idioma->browser_language }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ number_format($idioma->total) }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ number_format(($idioma->total / $totalVisitantes) * 100, 1) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recursos do Navegador -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Recursos do Navegador</h3>
            <div class="h-64">
                <canvas id="recursosChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Localizações e Últimos Visitantes -->
    <div class="grid auto-rows-min gap-4 md:grid-cols-2 mb-6">
        <!-- Localizações -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Localizações dos Visitantes</h3>
            <div class="overflow-y-auto h-96">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Localização</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Visitantes</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">%</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($localizacoes as $localizacao)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $localizacao->location }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ number_format($localizacao->total) }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ number_format(($localizacao->total / $totalVisitantes) * 100, 1) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Últimos Visitantes -->
        <div class="rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Últimos Visitantes</h3>
            <div class="overflow-y-auto h-96">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">IP</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Dispositivo / OS</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Navegador</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Data/Hora</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($ultimosVisitantes as $visitante)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $visitante->ip_address }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $visitante->device_type }} / {{ $visitante->os_info }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $visitante->browser_info }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($visitante->created_at)->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
    <!-- Script para gráficos -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Configurações de cores
            const colors = {
                blue: 'rgba(66, 133, 244, 0.7)',
                green: 'rgba(52, 168, 83, 0.7)',
                yellow: 'rgba(251, 188, 5, 0.7)',
                red: 'rgba(234, 67, 53, 0.7)',
                purple: 'rgba(128, 0, 128, 0.7)',
                orange: 'rgba(255, 159, 64, 0.7)',
                cyan: 'rgba(75, 192, 192, 0.7)',
                darkblue: 'rgba(54, 162, 235, 0.7)'
            };

            const bordersColors = {
                blue: 'rgba(66, 133, 244, 1)',
                green: 'rgba(52, 168, 83, 1)',
                yellow: 'rgba(251, 188, 5, 1)',
                red: 'rgba(234, 67, 53, 1)',
                purple: 'rgba(128, 0, 128, 1)',
                orange: 'rgba(255, 159, 64, 1)',
                cyan: 'rgba(75, 192, 192, 1)',
                darkblue: 'rgba(54, 162, 235, 1)'
            };

            // Definir para tema escuro se necessário
            if (document.documentElement.classList.contains('dark')) {
                Chart.defaults.color = 'rgba(255, 255, 255, 0.8)';
                Chart.defaults.borderColor = 'rgba(255, 255, 255, 0.1)';
            }

            // Gráfico de Visitantes
            const visitantesData = @json($visitantesPorDia);
            const visitantesCtx = document.getElementById('visitantesChart').getContext('2d');
            new Chart(visitantesCtx, {
                type: 'line',
                data: {
                    labels: visitantesData.map(item => {
                        const date = new Date(item.data);
                        return date.toLocaleDateString('pt-BR', {day: '2-digit', month: '2-digit'});
                    }),
                    datasets: [{
                        label: 'Visitantes',
                        data: visitantesData.map(item => item.total),
                        backgroundColor: colors.blue,
                        borderColor: bordersColors.blue,
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });


           // Gráfico de Dispositivos
           const dispositivosData = @json($dispositivosPorTipo);
            const dispositivosCtx = document.getElementById('dispositivosChart').getContext('2d');
            new Chart(dispositivosCtx, {
                type: 'doughnut',
                data: {
                    labels: dispositivosData.map(item => item.device_type),
                    datasets: [{
                        data: dispositivosData.map(item => item.total),
                        backgroundColor: [colors.green, colors.blue, colors.yellow],
                        borderColor: [bordersColors.green, bordersColors.blue, bordersColors.yellow],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                        }
                    }
                }
            });

            // Gráfico de Navegadores
            const navegadoresData = @json($navegadores);
            const navegadoresCtx = document.getElementById('navegadoresChart').getContext('2d');
            new Chart(navegadoresCtx, {
                type: 'pie',
                data: {
                    labels: navegadoresData.map(item => item.browser),
                    datasets: [{
                        data: navegadoresData.map(item => item.total),
                        backgroundColor: [colors.red, colors.blue, colors.green, colors.yellow, colors.purple],
                        borderColor: [bordersColors.red, bordersColors.blue, bordersColors.green, bordersColors.yellow, bordersColors.purple],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Gráfico de Sistemas Operacionais
            const osData = @json($sistemaOperacional);
            const osCtx = document.getElementById('osChart').getContext('2d');
            new Chart(osCtx, {
                type: 'bar',
                data: {
                    labels: osData.map(item => item.os),
                    datasets: [{
                        label: 'Sistemas Operacionais',
                        data: osData.map(item => item.total),
                        backgroundColor: [
                            colors.blue, colors.green, colors.yellow, colors.red, colors.purple,
                            colors.orange, colors.cyan, colors.darkblue
                        ],
                        borderColor: [
                            bordersColors.blue, bordersColors.green, bordersColors.yellow,
                            bordersColors.red, bordersColors.purple, bordersColors.orange,
                            bordersColors.cyan, bordersColors.darkblue
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Gráfico de Visitantes por Hora
            const horasData = @json($visitantesPorHora);
            const horasCtx = document.getElementById('horasChart').getContext('2d');
            new Chart(horasCtx, {
                type: 'line',
                data: {
                    labels: horasData.map(item => `${item.hora}h`),
                    datasets: [{
                        label: 'Visitantes',
                        data: horasData.map(item => item.total),
                        backgroundColor: colors.purple,
                        borderColor: bordersColors.purple,
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Gráfico de Recursos do Navegador
            const recursosData = @json($recursosNavegador);
            const recursosCtx = document.getElementById('recursosChart').getContext('2d');
            new Chart(recursosCtx, {
                type: 'radar',
                data: {
                    labels: Object.keys(recursosData),
                    datasets: [{
                        label: 'Suporte nos Navegadores (%)',
                        data: Object.values(recursosData).map(value => Math.round((value / {{ $totalVisitantes }}) * 100)),
                        backgroundColor: 'rgba(66, 133, 244, 0.4)',
                        borderColor: bordersColors.blue,
                        borderWidth: 2,
                        pointBackgroundColor: colors.blue,
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: colors.blue
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        }
                    }
                }
            });
<