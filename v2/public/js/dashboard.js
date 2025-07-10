




document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM carregado, iniciando gráficos...');

    try {
        // Verifica se os elementos canvas existem
        const visitorsChartElement = document.getElementById('visitorsChart');
        const hourlyChartElement = document.getElementById('hourlyVisitorsChart');
        const browsersChartElement = document.getElementById('browsersChart');
        const deviceChartElement = document.getElementById('deviceChart');

        console.log('Elementos canvas:', {
            visitorsChart: visitorsChartElement,
            hourlyChart: hourlyChartElement,
            browsersChart: browsersChartElement,
            deviceChart: deviceChartElement
        });

        // Verifica se os dados estão definidos
        if (typeof visitantesPorDia === 'undefined' || !visitantesPorDia) {
            console.error('Dados de visitantesPorDia não definidos!');
            // Usar dados de fallback
            window.visitantesPorDia = [
                {data: '2024-04-01', total: 5},
                {data: '2024-04-02', total: 10}
            ];
        }

        if (typeof visitantesPorHora === 'undefined' || !visitantesPorHora) {
            console.error('Dados de visitantesPorHora não definidos!');
            // Usar dados de fallback
            window.visitantesPorHora = [
                {hora: 0, total: 1},
                {hora: 12, total: 5},
                {hora: 18, total: 3}
            ];
        }

        // Gráfico de Visitantes por Dia
        if (visitorsChartElement) {
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
                            displayColors: false
                        }
                    }
                }
            };

            console.log('Criando gráfico de visitantes diários...');
            new Chart(visitorsChartElement, visitorsConfig);
        }

        // Gráfico de Visitantes por Hora
        if (hourlyChartElement) {
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

            console.log('Criando gráfico de visitantes por hora...');
            new Chart(hourlyChartElement, hourlyConfig);
        }

        // Gráfico de Navegadores
        if (browsersChartElement && navegadores && navegadores.length > 0) {
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
                            padding: 10
                        }
                    },
                    cutout: '65%'
                }
            };

            console.log('Criando gráfico de navegadores...');
            new Chart(browsersChartElement, browsersConfig);
        }

        // Gráfico de Dispositivos
        if (deviceChartElement && dispositivosPorTipo && dispositivosPorTipo.length > 0) {
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

            console.log('Criando gráfico de dispositivos...');
            new Chart(deviceChartElement, deviceConfig);
        }

        console.log('Todos os gráficos inicializados com sucesso');
    } catch (error) {
        console.error('Erro ao inicializar gráficos:', error);
    }
});
