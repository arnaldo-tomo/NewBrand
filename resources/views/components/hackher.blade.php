<div id="tech-tracker" class="tech-tracker collapsed">
    <div class="tech-tracker-toggle">
        <div class="toggle-icon">
            <i class="fas fa-microchip"></i>
        </div>
        <div class="pulse-effect"></div>
    </div>
    
    <div class="tech-tracker-panel">
        <div class="tracker-header">
            <h3><i class="fas fa-code"></i> Essa Toda Infromção é sua</h3>
            <div class="header-actions">
                <button class="refresh-data"><i class="fas fa-sync-alt"></i></button>
                <button class="close-panel"><i class="fas fa-times"></i></button>
            </div>
        </div>
        
        <div class="tracker-body">
            <div class="info-section">
                <h4><i class="fas fa-user"></i> Visitante</h4>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">IP</span>
                        <span class="info-value" id="visitor-ip">{{ request()->ip() }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Localização</span>
                        <span class="info-value" id="visitor-location">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Provedor</span>
                        <span class="info-value" id="visitor-isp">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Tempo na página</span>
                        <span class="info-value" id="time-on-page">00:00</span>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h4><i class="fas fa-laptop"></i> Sistema</h4>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Dispositivo</span>
                        <span class="info-value" id="device-type">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Sistema Operacional</span>
                        <span class="info-value" id="os-info">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Resolução</span>
                        <span class="info-value" id="screen-resolution">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Cores</span>
                        <span class="info-value" id="color-depth">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">DPI / Escala</span>
                        <span class="info-value" id="pixel-ratio">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Memória</span>
                        <span class="info-value" id="device-memory">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Bateria</span>
                        <span class="info-value" id="battery-status">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Modo Escuro</span>
                        <span class="info-value" id="dark-mode">Detectando...</span>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h4><i class="fas fa-globe"></i> Navegador</h4>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Navegador</span>
                        <span class="info-value" id="browser-info">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Engine</span>
                        <span class="info-value" id="browser-engine">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Idioma</span>
                        <span class="info-value" id="browser-language">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Cookies</span>
                        <span class="info-value" id="cookies-enabled">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Do Not Track</span>
                        <span class="info-value" id="do-not-track">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Janela do navegador</span>
                        <span class="info-value" id="viewport-size">Detectando...</span>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h4><i class="fas fa-network-wired"></i> Conexão</h4>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Tipo de conexão</span>
                        <span class="info-value" id="connection-type">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Velocidade estimada</span>
                        <span class="info-value" id="connection-speed">Detectando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Tempo de carregamento</span>
                        <span class="info-value" id="page-load-time">Calculando...</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Latência</span>
                        <span class="info-value" id="network-latency">Calculando...</span>
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h4><i class="fas fa-puzzle-piece"></i> Recursos</h4>
                <div class="features-grid">
                    <div class="feature-item" id="feature-webgl">
                        <i class="fas fa-cube"></i>
                        <span>WebGL</span>
                    </div>
                    <div class="feature-item" id="feature-canvas">
                        <i class="fas fa-paint-brush"></i>
                        <span>Canvas</span>
                    </div>
                    <div class="feature-item" id="feature-webrtc">
                        <i class="fas fa-video"></i>
                        <span>WebRTC</span>
                    </div>
                    <div class="feature-item" id="feature-webworker">
                        <i class="fas fa-cogs"></i>
                        <span>Web Workers</span>
                    </div>
                    <div class="feature-item" id="feature-geolocation">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Geolocalização</span>
                    </div>
                    <div class="feature-item" id="feature-touch">
                        <i class="fas fa-hand-pointer"></i>
                        <span>Touch</span>
                    </div>
                    <div class="feature-item" id="feature-notifications">
                        <i class="fas fa-bell"></i>
                        <span>Notificações</span>
                    </div>
                    <div class="feature-item" id="feature-webcam">
                        <i class="fas fa-camera"></i>
                        <span>Webcam</span>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h4><i class="fas fa-server"></i> Servidor</h4>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Sessão atual</span>
                        <span class="info-value" id="session-id">{{ session()->getId() }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Idioma do site</span>
                        <span class="info-value">{{ app()->getLocale() }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Hora do servidor</span>
                        <span class="info-value" id="server-time">{{ now()->format('H:i:s') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Data</span>
                        <span class="info-value">{{ now()->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tracker-footer">
            <div class="version">v1.0</div>
            <div class="brand">by Arnaldo Tomo</div>
        </div>
    </div>
</div>
