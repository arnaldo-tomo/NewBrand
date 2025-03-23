
document.addEventListener('DOMContentLoaded', function() {


    // Verifica se o navegador suporta recursos modernos de JavaScript
    var isModernBrowser = 'querySelector' in document && 'addEventListener' in window;
    if (!isModernBrowser) {
        console.error('Seu navegador não suporta recursos modernos necessários para o dashboard.');
        // Adiciona uma mensagem visível no dashboard
        var elements = document.querySelectorAll('.chart-container');
        for (var i = 0; i < elements.length; i++) {
            elements[i].innerHTML = '<div style="text-align: center; padding: 20px; color: #666;">Seu navegador não suporta a visualização de gráficos. Por favor, use um navegador mais recente.</div>';
        }
        return;
    }

    // Verifica se Chart.js já foi carregado
    if (typeof Chart === 'undefined') {
        console.log('Chart.js não detectado. Carregando biblioteca...');

        // Cria um elemento script para carregar o Chart.js
        var script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js';
        script.integrity = 'sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=';
        script.crossOrigin = 'anonymous';

        script.onload = function() {
            console.log('Chart.js carregado com sucesso.');
            initCharts();
        };

        script.onerror = function() {
            console.error('Falha ao carregar Chart.js. Verificando CDN alternativo...');
            // Tenta outro CDN se o primeiro falhar
            var backupScript = document.createElement('script');
            backupScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js';
            backupScript.onload = function() {
                console.log('Chart.js carregado do CDN alternativo.');
                initCharts();
            };
            backupScript.onerror = function() {
                console.error('Não foi possível carregar Chart.js. Os gráficos não serão exibidos.');
                showErrorMessages();
            };
            document.head.appendChild(backupScript);
        };

        document.head.appendChild(script);
    } else {
        console.log('Chart.js já está carregado. Inicializando gráficos...');
        setTimeout(initCharts, 100); // Pequeno atraso para garantir que tudo está pronto
    }

    // Mostra mensagens de erro nos contêineres de gráficos
    function showErrorMessages() {
        var chartContainers = document.querySelectorAll('.chart-container, [id$="Chart"]').forEach(function(container) {
            if (container) {
                container.innerHTML = '<div style="display:flex; align-items:center; justify-content:center; height:100%; padding:20px; text-align:center; color:#666; border:1px dashed #ccc; border-radius:5px;">Não foi possível carregar os gráficos. Verifique sua conexão com a internet.</div>';
            }
        });
    }

    // Função para inicializar todos os gráficos
    function initCharts() {
        try {
            console.log('Iniciando configuração de gráficos...');

            // Configurações gerais para todos os gráficos
            Chart.defaults.font.family = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif';
            Chart.defaults.color = '#666';
            Chart.defaults.borderColor = '#e5e7eb';

            // Verifica tema escuro
            var isDarkMode = document.documentElement.classList.contains('dark') ||
                            document.body.classList.contains('dark') ||
                            window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (isDarkMode) {
                Chart.defaults.color = '#e5e7eb';
                Chart.defaults.borderColor = '#374151';
            }

            // Conjunto de cores para os gráficos
            var colors = {
                blue: isDarkMode ? 'rgba(96, 165, 250, 0.7)' : 'rgba(66, 133, 244, 0.7)',
                green: isDarkMode ? 'rgba(110, 231, 183, 0.7)' : 'rgba(52, 168, 83, 0.7)',
                yellow: isDarkMode ? 'rgba(251, 191, 36, 0.7)' : 'rgba(251, 188, 5, 0.7)',
                red: isDarkMode ? 'rgba(248, 113, 113, 0.7)' : 'rgba(234, 67, 53, 0.7)',
                purple: isDarkMode ? 'rgba(167, 139, 250, 0.7)' : 'rgba(128, 0, 128, 0.7)',
                orange: isDarkMode ? 'rgba(251, 146, 60, 0.7)' : 'rgba(255, 159, 64, 0.7)',
                cyan: isDarkMode ? 'rgba(103, 232, 249, 0.7)' : 'rgba(75, 192, 192, 0.7)',
                darkblue: isDarkMode ? 'rgba(129, 140, 248, 0.7)' : 'rgba(54, 162, 235, 0.7)'
            };

            var borderColors = {
                blue: isDarkMode ? 'rgba(96, 165, 250, 1)' : 'rgba(66, 133, 244, 1)',
                green: isDarkMode ? 'rgba(110, 231, 183, 1)' : 'rgba(52, 168, 83, 1)',
                yellow: isDarkMode ? 'rgba(251, 191, 36, 1)' : 'rgba(251, 188, 5, 1)',
                red: isDarkMode ? 'rgba(248, 113, 113, 1)' : 'rgba(234, 67, 53, 1)',
                purple: isDarkMode ? 'rgba(167, 139, 250, 1)' : 'rgba(128, 0, 128, 1)',
                orange: isDarkMode ? 'rgba(251, 146, 60, 1)' : 'rgba(255, 159, 64, 1)',
                cyan: isDarkMode ? 'rgba(103, 232, 249, 1)' : 'rgba(75, 192, 192, 1)',
                darkblue: isDarkMode ? 'rgba(129, 140, 248, 1)' : 'rgba(54, 162, 235, 1)'
            };

            // Criar gráficos com dados de amostra (substitua pelos dados reais quando disponíveis)
            createSampleCharts(colors, borderColors);

        } catch (error) {
            console.error('Erro ao inicializar gráficos:', error);
            showErrorMessages();
        }
    }

    // Função para criar gráficos de amostra
    function createSampleCharts(colors, borderColors) {
        // Função auxiliar para criar um gráfico com tratamento de erros
        function createChart(canvasId, chartType, chartData, chartOptions) {
            try {
                // Verifica se o elemento canvas existe
                var canvas = document.getElementById(canvasId);
                if (!canvas) {
                    console.error('Elemento #' + canvasId + ' não encontrado.');
                    return null;
                }

                // Verifica se o elemento é um canvas válido
                if (canvas.tagName.toLowerCase() !== 'canvas') {
                    console.error('Elemento #' + canvasId + ' não é um canvas.');
                    // Tenta encontrar um canvas dentro do elemento
                    var canvasChild = canvas.querySelector('canvas');
                    if (canvasChild) {
                        canvas = canvasChild;
                    } else {
                        // Cria um novo canvas e substitui o conteúdo
                        var parent = canvas.parentNode;
                        var newCanvas = document.createElement('canvas');
                        newCanvas.id = canvasId;
                        newCanvas.style.width = '100%';
                        newCanvas.style.height = '100%';
                        parent.innerHTML = '';
                        parent.appendChild(newCanvas);
                        canvas = newCanvas;
                    }
                }

                // Verifica se o canvas tem um contexto válido
                var ctx = canvas.getContext('2d');
                if (!ctx) {
                    console.error('Não foi possível obter contexto 2D para #' + canvasId);
                    return null;
                }

                // Remove qualquer gráfico existente associado a este canvas
                if (window.chartRegistry && window.chartRegistry[canvasId]) {
                    window.chartRegistry[canvasId].destroy();
                }

                // Cria o novo gráfico
                var chart = new Chart(ctx, {
                    type: chartType,
                    data: chartData,
                    options: chartOptions
                });

                // Registra o gráfico para poder destruí-lo posteriormente se necessário
                if (!window.chartRegistry) window.chartRegistry = {};
                window.chartRegistry[canvasId] = chart;

                console.log('Gráfico criado com sucesso:', canvasId);
                return chart;
            } catch (e) {
                console.error('Erro ao criar gráfico ' + canvasId + ':', e);
                return null;
            }
        }

        // Dados de amostra - Visitantes por dia
        var visitantesPorDia = [];
        var hoje = new Date();
        for (var i = 30; i >= 0; i--) {
            var data = new Date(hoje);
            data.setDate(hoje.getDate() - i);
            visitantesPorDia.push({
                data: data.toISOString().split('T')[0],
                total: Math.floor(Math.random() * 10) + 1  // 1-10 visitantes por dia
            });
        }

        // 1. Gráfico de Visitantes por Dia
        createChart('visitantesChart', 'line', {
            labels: visitantesPorDia.map(function(item) {
                var date = new Date(item.data);
                return date.getDate() + '/' + (date.getMonth() + 1);
            }),
            datasets: [{
                label: 'Visitantes',
                data: visitantesPorDia.map(function(item) { return item.total; }),
                backgroundColor: colors.blue,
                borderColor: borderColors.blue,
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                },
                x: { grid: { display: false } }
            }
        });

        // 2. Gráfico de Dispositivos
        createChart('dispositivosChart', 'doughnut', {
            labels: ['Desktop', 'Mobile', 'Tablet'],
            datasets: [{
                data: [70, 25, 5],  // Valores de amostra
                backgroundColor: [colors.green, colors.blue, colors.yellow],
                borderColor: [borderColors.green, borderColors.blue, borderColors.yellow],
                borderWidth: 1
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'right' }
            }
        });

        // 3. Gráfico de Navegadores
        createChart('navegadoresChart', 'pie', {
            labels: ['Chrome', 'Firefox', 'Safari', 'Edge'],
            datasets: [{
                data: [60, 20, 15, 5],  // Valores de amostra
                backgroundColor: [colors.red, colors.blue, colors.green, colors.yellow],
                borderColor: [borderColors.red, borderColors.blue, borderColors.green, borderColors.yellow],
                borderWidth: 1
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'right' }
            }
        });

        // 4. Gráfico de Sistemas Operacionais
        createChart('osChart', 'bar', {
            labels: ['Windows', 'macOS', 'iOS', 'Android', 'Linux'],
            datasets: [{
                label: 'Sistemas Operacionais',
                data: [45, 25, 15, 10, 5],  // Valores de amostra
                backgroundColor: [
                    colors.blue, colors.green, colors.purple,
                    colors.yellow, colors.orange
                ],
                borderColor: [
                    borderColors.blue, borderColors.green, borderColors.purple,
                    borderColors.yellow, borderColors.orange
                ],
                borderWidth: 1
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                },
                x: { grid: { display: false } }
            }
        });

        // 5. Gráfico de Visitantes por Hora
        var horaData = [];
        for (var hora = 0; hora < 24; hora++) {
            horaData.push({
                hora: hora,
                total: Math.floor(Math.random() * 5) + (hora >= 8 && hora <= 18 ? 5 : 1)  // Mais visitantes durante o dia
            });
        }

        createChart('horasChart', 'line', {
            labels: horaData.map(function(item) { return item.hora + 'h'; }),
            datasets: [{
                label: 'Visitantes',
                data: horaData.map(function(item) { return item.total; }),
                backgroundColor: colors.purple,
                borderColor: borderColors.purple,
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                },
                x: { grid: { display: false } }
            }
        });

        // 6. Gráfico de Recursos do Navegador
        var recursosData = {
            'WebGL': 90,
            'Canvas': 95,
            'WebRTC': 80,
            'Web Workers': 85,
            'Geolocalização': 75,
            'Touch': 70,
            'Notificações': 60,
            'Webcam': 50
        };

        createChart('recursosChart', 'radar', {
            labels: Object.keys(recursosData),
            datasets: [{
                label: 'Suporte nos Navegadores (%)',
                data: Object.values(recursosData),
                backgroundColor: 'rgba(66, 133, 244, 0.4)',
                borderColor: borderColors.blue,
                borderWidth: 2,
                pointBackgroundColor: colors.blue,
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: colors.blue
            }]
        }, {
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
        });
    }


});

/**
 * Script para adicionar interatividade às tabelas do dashboard
 */

document.addEventListener('DOMContentLoaded', function() {
    // Inicializa todas as tabelas interativas
    initializeTables();

    // Adiciona funções aos botões de ação
    setupTableActions();
  });

  /**
   * Inicializa todas as tabelas do dashboard com recursos avançados
   */
  function initializeTables() {
    // Adiciona classes às células de porcentagem
    document.querySelectorAll('.dashboard-table td:nth-child(3)').forEach(function(cell) {
      if (cell.textContent.includes('%')) {
        cell.classList.add('percentage-cell');
      }
    });

    // Adiciona classes às células numéricas
    document.querySelectorAll('.dashboard-table td').forEach(function(cell) {
      if (!isNaN(parseFloat(cell.textContent)) && cell.textContent.trim() !== '') {
        cell.classList.add('number-cell');
      }
    });

    // Destaca a linha atual quando o mouse passa por cima
    document.querySelectorAll('.dashboard-table tbody tr').forEach(function(row) {
      row.addEventListener('mouseenter', function() {
        this.classList.add('hover');
      });

      row.addEventListener('mouseleave', function() {
        this.classList.remove('hover');
      });
    });
  }

  /**
   * Configura as ações dos botões das tabelas
   */
  function setupTableActions() {
    // Botões de atualização
    document.querySelectorAll('.table-action-button[title="Atualizar dados"]').forEach(function(button) {
      button.addEventListener('click', function() {
        const tableContainer = this.closest('.card').querySelector('.table-container');

        // Efeito visual de atualização
        tableContainer.style.opacity = '0.6';

        // Simula uma atualização
        setTimeout(function() {
          tableContainer.style.opacity = '1';

          // Poderia chamar uma função para recarregar os dados reais aqui
          console.log('Tabela atualizada');
        }, 800);
      });
    });

    // Botões de exportação
    document.querySelectorAll('.table-action-button[title="Exportar dados"]').forEach(function(button) {
      button.addEventListener('click', function() {
        const tableElement = this.closest('.card').querySelector('.dashboard-table');
        const tableName = this.closest('.card').querySelector('h3').textContent.trim();

        exportTableToCSV(tableElement, tableName);
      });
    });
  }

  /**
   * Exporta uma tabela para arquivo CSV
   */
  function exportTableToCSV(table, filename) {
    const rows = table.querySelectorAll('tr');
    let csv = [];

    for (let i = 0; i < rows.length; i++) {
      const row = [], cols = rows[i].querySelectorAll('td, th');

      for (let j = 0; j < cols.length; j++) {
        // Remove qualquer vírgula para evitar problemas com o CSV
        let data = cols[j].innerText.replace(/(\r\n|\n|\r|,)/gm, ' ').trim();
        row.push('"' + data + '"');
      }

      csv.push(row.join(','));
    }

    // Cria um link para download e aciona o clique
    const csvContent = 'data:text/csv;charset=utf-8,' + csv.join('\n');
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement('a');

    link.setAttribute('href', encodedUri);
    link.setAttribute('download', filename + '_' + getFormattedDate() + '.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }

  /**
   * Retorna a data atual formatada para uso em nomes de arquivos
   */
  function getFormattedDate() {
    const date = new Date();
    const year = date.getFullYear();
    const month = ('0' + (date.getMonth() + 1)).slice(-2);
    const day = ('0' + date.getDate()).slice(-2);

    return year + month + day;
  }

  /**
   * Adiciona funcionalidade de ordenação às tabelas
   * Pode ser chamado para tabelas específicas se necessário
   */
  function addSortingToTable(tableId) {
    const table = document.getElementById(tableId);
    if (!table) return;

    const headers = table.querySelectorAll('th');

    headers.forEach(function(header, index) {
      // Adiciona cursor pointer e classe para indicar que é ordenável
      header.classList.add('sortable');
      header.style.cursor = 'pointer';

      // Adiciona ícone de ordenação
      const sortIcon = document.createElement('span');
      sortIcon.innerHTML = ' ⇅';
      sortIcon.classList.add('sort-icon');
      sortIcon.style.opacity = '0.5';
      header.appendChild(sortIcon);

      // Adiciona evento de clique para ordenação
      header.addEventListener('click', function() {
        const isAscending = this.classList.contains('sort-asc');

        // Remove classes de ordenação de todos os cabeçalhos
        headers.forEach(h => {
          h.classList.remove('sort-asc', 'sort-desc');
          h.querySelector('.sort-icon').style.opacity = '0.5';
        });

        // Adiciona classe de ordenação ao cabeçalho atual
        this.classList.add(isAscending ? 'sort-desc' : 'sort-asc');
        this.querySelector('.sort-icon').style.opacity = '1';

        // Ordena a tabela
        sortTable(table, index, !isAscending);
      });
    });
  }

  /**
   * Função para ordenar uma tabela por uma coluna específica
   */
  function sortTable(table, columnIndex, ascending) {
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    // Ordena as linhas
    rows.sort(function(a, b) {
      const aValue = a.cells[columnIndex].textContent.trim();
      const bValue = b.cells[columnIndex].textContent.trim();

      // Verifica se os valores são números
      const aNum = parseFloat(aValue.replace(/[^\d.-]/g, ''));
      const bNum = parseFloat(bValue.replace(/[^\d.-]/g, ''));

      if (!isNaN(aNum) && !isNaN(bNum)) {
        return ascending ? aNum - bNum : bNum - aNum;
      }

      // Caso contrário, compara como strings
      return ascending ?
        aValue.localeCompare(bValue) :
        bValue.localeCompare(aValue);
    });

    // Reinsere as linhas ordenadas
    rows.forEach(function(row) {
      tbody.appendChild(row);
    });

    const ctx = document.getElementById('visitantesChart').getContext('2d');
const visitantesChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['2/2', '3/2', '4/2', '5/2', '6/2', '7/2', '8/2', '9/2', '10/2'], // Ajuste conforme seus dados
        datasets: [{
            label: 'Visitantes',
            data: [5, 8, 3, 7, 4, 9, 6, 5, 7], // Ajuste conforme seus dados
            borderColor: '#3B82F6',
            backgroundColor: 'rgba(59, 130, 246, 0.2)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(209, 213, 219, 0.2)'
                },
                ticks: {
                    color: '#D1D5DB'
                }
            },
            x: {
                grid: {
                    color: 'rgba(209, 213, 219, 0.2)'
                },
                ticks: {
                    color: '#D1D5DB'
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: '#D1D5DB'
                }
            }
        }
    }
});
  }