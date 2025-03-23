<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Login' }}</title>
<link rel="icon" href="images/favicon.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/favicon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<style>
    /* CSS adicional para o dashboard de visitantes */

/* Efeito de gradiente nos cartões de estatísticas */
.dashboard-stat-card {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.dashboard-stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Animação de entrada para os cartões */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animated-card {
    animation: fadeInUp 0.5s ease-out forwards;
}

.animated-card:nth-child(1) { animation-delay: 0.1s; }
.animated-card:nth-child(2) { animation-delay: 0.2s; }
.animated-card:nth-child(3) { animation-delay: 0.3s; }
.animated-card:nth-child(4) { animation-delay: 0.4s; }

/* Efeito hover nas tabelas */
.data-table tbody tr {
    transition: background-color 0.2s ease;
}

.data-table tbody tr:hover {
    background-color: rgba(243, 244, 246, 0.5);
}

.dark .data-table tbody tr:hover {
    background-color: rgba(55, 65, 81, 0.5);
}

/* Personalização dos gráficos */
canvas {
    transition: filter 0.3s ease;
}

.chart-container:hover canvas {
    filter: brightness(1.05);
}

/* Scrollbar personalizada para as tabelas */
.custom-scrollbar::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.dark .custom-scrollbar::-webkit-scrollbar-track {
    background: #374151;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.dark .custom-scrollbar::-webkit-scrollbar-thumb {
    background: #4b5563;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

.dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #6b7280;
}

/* Badges para estatísticas */
.stat-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 500;
}

.stat-badge-success {
    background-color: rgba(52, 211, 153, 0.2);
    color: #10b981;
}

.dark .stat-badge-success {
    background-color: rgba(52, 211, 153, 0.2);
    color: #34d399;
}

.stat-badge-warning {
    background-color: rgba(251, 191, 36, 0.2);
    color: #d97706;
}

.dark .stat-badge-warning {
    background-color: rgba(251, 191, 36, 0.2);
    color: #fbbf24;
}

.stat-badge-danger {
    background-color: rgba(239, 68, 68, 0.2);
    color: #dc2626;
}

.dark .stat-badge-danger {
    background-color: rgba(239, 68, 68, 0.2);
    color: #ef4444;
}

/* Indicadores de tendência */
.trend-indicator {
    display: inline-flex;
    align-items: center;
    margin-left: 0.5rem;
    font-size: 0.75rem;
}

.trend-up {
    color: #10b981;
}

.trend-down {
    color: #ef4444;
}

.trend-neutral {
    color: #9ca3af;
}

/* Tooltip personalizado */
.custom-tooltip {
    position: relative;
}

.custom-tooltip:hover::after {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    padding: 0.25rem 0.5rem;
    background-color: #1f2937;
    color: white;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    white-space: nowrap;
    z-index: 10;
}

/* Efeito de pulso para dados ao vivo */
@keyframes pulse {
    0% {
        opacity: 0.6;
    }
    50% {
        opacity: 1;
    }
    100% {
        opacity: 0.6;
    }
}

.live-data {
    animation: pulse 2s infinite;
}

/* Efeito de brilho para destacar cartões importantes */
.highlight-card {
    position: relative;
    overflow: hidden;
}

.highlight-card::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to bottom right,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.1) 50%,
        rgba(255, 255, 255, 0) 100%
    );
    transform: rotate(30deg);
    animation: shine 3s infinite;
}

@keyframes shine {
    0% {
        transform: rotate(30deg) translate(-100%, -100%);
    }
    100% {
        transform: rotate(30deg) translate(100%, 100%);
    }
}
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
