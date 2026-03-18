<div id="tech-tracker" class="tech-tracker collapsed">
    <div class="tech-tracker-toggle">
        <div class="toggle-icon"><i class="fas fa-microchip"></i></div>
        <div class="pulse-effect"></div>
    </div>

    <div class="tech-tracker-panel">
        <div class="tracker-header">
            <div class="tracker-header-dots">
                <span class="thdot thdot--red"></span>
                <span class="thdot thdot--yellow"></span>
                <span class="thdot thdot--green"></span>
            </div>
            <span class="tracker-header-title">Sua Pegada Digital</span>
            <div class="header-actions">
                <button onclick="hackherDetect()" title="Atualizar"><i class="fas fa-sync-alt"></i></button>
                <button class="close-panel" title="Fechar"><i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="tracker-hero">
            <div class="hero-cell">
                <span class="hero-label">IP</span>
                <span class="hero-value" id="visitor-ip">{{ request()->ip() }}</span>
            </div>
            <div class="hero-sep"></div>
            <div class="hero-cell">
                <span class="hero-label">Localização</span>
                <span class="hero-value" id="visitor-location">—</span>
            </div>
            <div class="hero-sep"></div>
            <div class="hero-cell">
                <span class="hero-label">Tempo</span>
                <span class="hero-value" id="time-on-page">00:00</span>
            </div>
        </div>

        <div class="tracker-tabs">
            <button class="tracker-tab active" onclick="hackherTab('system',this)"><i class="fas fa-laptop"></i> Sistema</button>
            <button class="tracker-tab" onclick="hackherTab('browser',this)"><i class="fas fa-globe"></i> Browser</button>
            <button class="tracker-tab" onclick="hackherTab('network',this)"><i class="fas fa-wifi"></i> Rede</button>
            <button class="tracker-tab" onclick="hackherTab('features',this)"><i class="fas fa-puzzle-piece"></i> API's</button>
        </div>

        <div class="tracker-body">
            <div id="tab-system" style="display:block">
                <div class="info-row"><span class="row-label">Dispositivo</span><span class="row-value" id="device-type">—</span></div>
                <div class="info-row"><span class="row-label">Sistema Operacional</span><span class="row-value" id="os-info">—</span></div>
                <div class="info-row"><span class="row-label">Resolução</span><span class="row-value" id="screen-resolution">—</span></div>
                <div class="info-row"><span class="row-label">Escala DPI</span><span class="row-value" id="pixel-ratio">—</span></div>
                <div class="info-row"><span class="row-label">Memória RAM</span><span class="row-value" id="device-memory">—</span></div>
                <div class="info-row"><span class="row-label">Bateria</span><span class="row-value" id="battery-status">—</span></div>
                <div class="info-row"><span class="row-label">Modo Escuro</span><span class="row-value" id="dark-mode">—</span></div>
                <div class="info-row"><span class="row-label">Profundidade cores</span><span class="row-value" id="color-depth">—</span></div>
            </div>
            <div id="tab-browser" style="display:none">
                <div class="info-row"><span class="row-label">Navegador</span><span class="row-value" id="browser-info">—</span></div>
                <div class="info-row"><span class="row-label">Engine</span><span class="row-value" id="browser-engine">—</span></div>
                <div class="info-row"><span class="row-label">Idioma</span><span class="row-value" id="browser-language">—</span></div>
                <div class="info-row"><span class="row-label">Cookies</span><span class="row-value" id="cookies-enabled">—</span></div>
                <div class="info-row"><span class="row-label">Do Not Track</span><span class="row-value" id="do-not-track">—</span></div>
                <div class="info-row"><span class="row-label">Janela</span><span class="row-value" id="viewport-size">—</span></div>
                <div class="info-row"><span class="row-label">Sessão</span><span class="row-value mono-sm" id="session-id">{{ session()->getId() }}</span></div>
                <div class="info-row"><span class="row-label">Idioma do site</span><span class="row-value">{{ app()->getLocale() }}</span></div>
            </div>
            <div id="tab-network" style="display:none">
                <div class="info-row"><span class="row-label">Provedor (ISP)</span><span class="row-value" id="visitor-isp">—</span></div>
                <div class="info-row"><span class="row-label">Tipo de conexão</span><span class="row-value" id="connection-type">—</span></div>
                <div class="info-row"><span class="row-label">Velocidade</span><span class="row-value" id="connection-speed">—</span></div>
                <div class="info-row"><span class="row-label">Tempo carregamento</span><span class="row-value" id="page-load-time">—</span></div>
                <div class="info-row"><span class="row-label">Latência</span><span class="row-value" id="network-latency">—</span></div>
                <div class="info-row"><span class="row-label">Hora do servidor</span><span class="row-value" id="server-time">{{ now()->format('H:i:s') }}</span></div>
                <div class="info-row"><span class="row-label">Data</span><span class="row-value">{{ now()->format('d/m/Y') }}</span></div>
            </div>
            <div id="tab-features" style="display:none">
                <div class="features-grid">
                    <div class="feature-item" id="feature-webgl"><i class="fas fa-cube"></i><span>WebGL</span></div>
                    <div class="feature-item" id="feature-canvas"><i class="fas fa-paint-brush"></i><span>Canvas</span></div>
                    <div class="feature-item" id="feature-webrtc"><i class="fas fa-video"></i><span>WebRTC</span></div>
                    <div class="feature-item" id="feature-webworker"><i class="fas fa-cogs"></i><span>Workers</span></div>
                    <div class="feature-item" id="feature-geolocation"><i class="fas fa-map-marker-alt"></i><span>Geo</span></div>
                    <div class="feature-item" id="feature-touch"><i class="fas fa-hand-pointer"></i><span>Touch</span></div>
                    <div class="feature-item" id="feature-notifications"><i class="fas fa-bell"></i><span>Push</span></div>
                    <div class="feature-item" id="feature-webcam"><i class="fas fa-camera"></i><span>Webcam</span></div>
                </div>
            </div>
        </div>

        <div class="tracker-footer">
            <span class="version">v2.0</span>
            <span class="brand">by Arnaldo Tomo</span>
        </div>
    </div>
</div>
