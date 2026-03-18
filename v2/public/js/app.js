
document.addEventListener('DOMContentLoaded', function() {
    // Seletores principais
    const tracker = document.getElementById('tech-tracker');
    const toggle = document.querySelector('.tech-tracker-toggle');
    const closeBtn = document.querySelector('.close-panel');
    const refreshBtn = document.querySelector('.refresh-data');

    // Contagem de tempo
    let pageTimeCounter = 0;
    const timeOnPageElem = document.getElementById('time-on-page');

    // Gestão de estado
    if (toggle) toggle.addEventListener('click', function() {
        tracker.classList.toggle('collapsed');
        localStorage.setItem('tracker-state', tracker.classList.contains('collapsed') ? 'collapsed' : 'expanded');
        if (!tracker.classList.contains('collapsed')) {
            refreshData();
        }
    });

    if (closeBtn) closeBtn.addEventListener('click', function() {
        tracker.classList.add('collapsed');
        localStorage.setItem('tracker-state', 'collapsed');
    });

    if (refreshBtn) refreshBtn.addEventListener('click', refreshData);

    // Restaurar estado
    if (tracker) {
        const savedState = localStorage.getItem('tracker-state');
        if (savedState === 'expanded') {
            tracker.classList.remove('collapsed');
            setTimeout(refreshData, 500);
        }
    }

    // Função para atualizar todos os dados
    window.refreshData = function() {
        detectBrowserInfo();
        detectSystemInfo();
        detectConnectionInfo();
        detectFeatures();
        detectLocationInfo();
        updateViewportSize();
        updateBatteryStatus();
    }

    // Informações do navegador
    window.detectBrowserInfo = function() {
        const ua = navigator.userAgent;

        // Detectar navegador
        let browserName, browserVersion;
        if (ua.indexOf("Chrome") > -1 && ua.indexOf("Edg") === -1 && ua.indexOf("OPR") === -1) {
            browserName = "Chrome";
            browserVersion = ua.match(/Chrome\/(\d+\.\d+)/)[1];
        } else if (ua.indexOf("Safari") > -1 && ua.indexOf("Chrome") === -1) {
            browserName = "Safari";
            browserVersion = ua.match(/Version\/(\d+\.\d+)/)[1];
        } else if (ua.indexOf("Firefox") > -1) {
            browserName = "Firefox";
            browserVersion = ua.match(/Firefox\/(\d+\.\d+)/)[1];
        } else if (ua.indexOf("OPR") > -1 || ua.indexOf("Opera") > -1) {
            browserName = "Opera";
            browserVersion = ua.match(/(?:OPR|Opera)\/(\d+\.\d+)/)[1];
        } else if (ua.indexOf("Trident") > -1) {
            browserName = "Internet Explorer";
            browserVersion = ua.match(/rv:(\d+\.\d+)/)[1];
        } else if (ua.indexOf("Edg") > -1) {
            browserName = "Edge";
            browserVersion = ua.match(/Edg\/(\d+\.\d+)/)[1];
        } else {
            browserName = "Desconhecido";
            browserVersion = "";
        }

        document.getElementById('browser-info').textContent = `${browserName} ${browserVersion}`;

        // Engine de renderização
        let engine;
        if (ua.indexOf("Gecko") > -1 && ua.indexOf("Firefox") > -1) {
            engine = "Gecko";
        } else if (ua.indexOf("AppleWebKit") > -1) {
            engine = "WebKit";
        } else if (ua.indexOf("Trident") > -1) {
            engine = "Trident";
        } else if (ua.indexOf("Edg") > -1) {
            engine = "EdgeHTML";
        } else {
            engine = "Desconhecido";
        }

        document.getElementById('browser-engine').textContent = engine;

        // Idioma do navegador
        document.getElementById('browser-language').textContent = navigator.language || navigator.userLanguage;

        // Cookies habilitados
        document.getElementById('cookies-enabled').textContent = navigator.cookieEnabled ? "Habilitados" : "Desabilitados";

        // Do Not Track
        const dnt = navigator.doNotTrack || window.doNotTrack || navigator.msDoNotTrack;
        document.getElementById('do-not-track').textContent = dnt === "1" || dnt === "yes" ? "Ativado" : "Desativado";
    }

    // Informações do sistema
    window.detectSystemInfo = function() {
        const ua = navigator.userAgent;

        // Sistema operacional
        let os, osVersion = "";
        if (ua.indexOf("Win") > -1) {
            os = "Windows";
            if (ua.indexOf("Windows NT 10.0") > -1) osVersion = "10";
            else if (ua.indexOf("Windows NT 6.3") > -1) osVersion = "8.1";
            else if (ua.indexOf("Windows NT 6.2") > -1) osVersion = "8";
            else if (ua.indexOf("Windows NT 6.1") > -1) osVersion = "7";
            else if (ua.indexOf("Windows NT 6.0") > -1) osVersion = "Vista";
        } else if (ua.indexOf("Mac") > -1) {
            os = "macOS";
            const macOSMatch = ua.match(/Mac OS X (\d+[._]\d+[._]?\d*)/);
            if (macOSMatch) osVersion = macOSMatch[1].replace(/_/g, ".");
        } else if (ua.indexOf("Android") > -1) {
            os = "Android";
            const androidMatch = ua.match(/Android (\d+\.\d+)/);
            if (androidMatch) osVersion = androidMatch[1];
        } else if (ua.indexOf("iPhone") > -1 || ua.indexOf("iPad") > -1 || ua.indexOf("iPod") > -1) {
            os = "iOS";
            const iosMatch = ua.match(/OS (\d+[._]\d+[._]?\d*)/);
            if (iosMatch) osVersion = iosMatch[1].replace(/_/g, ".");
        } else if (ua.indexOf("Linux") > -1) {
            os = "Linux";
        } else {
            os = "Desconhecido";
        }

        document.getElementById('os-info').textContent = os + (osVersion ? " " + osVersion : "");

        // Tipo de dispositivo
        let deviceType;
        if (ua.indexOf("Mobi") > -1 || ua.indexOf("Android") > -1 && ua.indexOf("Mobile") > -1) {
            deviceType = "Smartphone";
        } else if (ua.indexOf("iPad") > -1 || (ua.indexOf("Android") > -1 && ua.indexOf("Mobile") === -1)) {
            deviceType = "Tablet";
        } else {
            deviceType = "Desktop";
        }

        document.getElementById('device-type').textContent = deviceType;

        // Resolução de tela
        document.getElementById('screen-resolution').textContent = `${screen.width}x${screen.height}`;

        // Profundidade de cor
        document.getElementById('color-depth').textContent = `${screen.colorDepth} bits`;

        // Relação de pixel (DPI/escala)
        document.getElementById('pixel-ratio').textContent = `${window.devicePixelRatio.toFixed(2)}x`;

        // Memória do dispositivo (se disponível)
        if (navigator.deviceMemory) {
            document.getElementById('device-memory').textContent = `${navigator.deviceMemory} GB`;
        } else {
            document.getElementById('device-memory').textContent = "Não disponível";
        }

        // Modo escuro
        const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        document.getElementById('dark-mode').textContent = isDarkMode ? "Ativado" : "Desativado";
    }

    // Atualizar informação da bateria
    window.updateBatteryStatus = function() {
        const batteryStatusElem = document.getElementById('battery-status');

        if (navigator.getBattery) {
            navigator.getBattery().then(function(battery) {
                const level = Math.floor(battery.level * 100);
                const charging = battery.charging ? 'carregando' : 'sem carregar';
                batteryStatusElem.textContent = `${level}% (${charging})`;

                // Atualiza quando o status muda
                battery.addEventListener('levelchange', function() {
                    const newLevel = Math.floor(battery.level * 100);
                    batteryStatusElem.textContent = `${newLevel}% (${battery.charging ? 'carregando' : 'sem carregar'})`;
                });

                battery.addEventListener('chargingchange', function() {
                    const level = Math.floor(battery.level * 100);
                    batteryStatusElem.textContent = `${level}% (${battery.charging ? 'carregando' : 'sem carregar'})`;
                });
            });
        } else {
            batteryStatusElem.textContent = "Não disponível";
        }
    }

    // Informações de conexão
    window.detectConnectionInfo = function() {
        // Tipo de conexão
        if (navigator.connection) {
            document.getElementById('connection-type').textContent = navigator.connection.effectiveType || "Desconhecido";

            // Velocidade estimada
            if (navigator.connection.downlink) {
                document.getElementById('connection-speed').textContent = `${navigator.connection.downlink} Mbps`;
            } else {
                document.getElementById('connection-speed').textContent = "Desconhecido";
            }
        } else {
            document.getElementById('connection-type').textContent = "Informação não disponível";
            document.getElementById('connection-speed').textContent = "Informação não disponível";
        }

        // Tempo de carregamento da página
        if (window.performance) {
            const pageLoadTime = window.performance.timing.domContentLoadedEventEnd -
                               window.performance.timing.navigationStart;
            document.getElementById('page-load-time').textContent = `${(pageLoadTime / 1000).toFixed(2)} segundos`;
        } else {
            document.getElementById('page-load-time').textContent = "Não disponível";
        }

        // Teste de latência simples
        const startTime = Date.now();
        fetch(window.location.href, { method: 'HEAD', cache: 'no-store' })
            .then(() => {
                const latency = Date.now() - startTime;
                document.getElementById('network-latency').textContent = `${latency} ms`;
            })
            .catch(() => {
                document.getElementById('network-latency').textContent = "Erro ao medir";
            });
    }
    // Detecção de recursos do navegador
    window.detectFeatures = function() {
        // WebGL
        try {
            const canvas = document.createElement('canvas');
            const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
            const hasWebGL = !!gl;
            markFeature('feature-webgl', hasWebGL);
        } catch (e) {
            markFeature('feature-webgl', false);
        }

        // Canvas
        try {
            const canvas = document.createElement('canvas');
            const hasCanvas = !!(canvas.getContext && canvas.getContext('2d'));
            markFeature('feature-canvas', hasCanvas);
        } catch (e) {
            markFeature('feature-canvas', false);
        }

        // WebRTC
        const hasWebRTC = !!(window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection);
        markFeature('feature-webrtc', hasWebRTC);

        // Web Workers
        const hasWebWorkers = !!window.Worker;
        markFeature('feature-webworker', hasWebWorkers);

        // Geolocalização
        const hasGeolocation = !!navigator.geolocation;
        markFeature('feature-geolocation', hasGeolocation);

        // Touch
        const hasTouch = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
        markFeature('feature-touch', hasTouch);

        // Notificações
        const hasNotifications = 'Notification' in window;
        markFeature('feature-notifications', hasNotifications);

        // Webcam
        const hasWebcam = !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
        markFeature('feature-webcam', hasWebcam);
    }

    function markFeature(id, available) {
        const element = document.getElementById(id);
        if (available) {
            element.classList.add('available');
        } else {
            element.classList.remove('available');
        }
    }

    // Localização aproximada (baseada em IP)
    window.detectLocationInfo = function() {
        fetch('https://ipapi.co/json/')
            .then(response => response.json())
            .then(data => {
                const location = `${data.city || 'Desconhecida'}, ${data.country_name || 'Desconhecido'}`;
                document.getElementById('visitor-location').textContent = location;

                // Provedor de internet
                document.getElementById('visitor-isp').textContent = data.org || 'Desconhecido';
            })
            .catch(() => {
                document.getElementById('visitor-location').textContent = 'Não detectado';
                document.getElementById('visitor-isp').textContent = 'Não detectado';
            });
    }

    // Atualizar tamanho da viewport
    window.updateViewportSize = function() {
        const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        const height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        document.getElementById('viewport-size').textContent = `${width}x${height}`;

        // Atualizar quando a janela for redimensionada
        window.addEventListener('resize', function() {
            const newWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            const newHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            document.getElementById('viewport-size').textContent = `${newWidth}x${newHeight}`;
        });
    }

    // Atualizar tempo na página
    function updatePageTime() {
        setInterval(function() {
            pageTimeCounter++;
            const minutes = Math.floor(pageTimeCounter / 60);
            const seconds = pageTimeCounter % 60;
            timeOnPageElem.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }, 1000);
    }

    // Atualizar hora do servidor
    const serverTimeElem = document.getElementById('server-time');
    if (serverTimeElem) {
        setInterval(function() {
            const now = new Date();
            serverTimeElem.textContent = now.toLocaleTimeString();
        }, 1000);
    }

    // Inicialização
    if (timeOnPageElem) updatePageTime();

    // Se o site estiver sendo visualizado, inicializa as detecções básicas
    if (tracker && !tracker.classList.contains('collapsed')) {
        refreshData();
    }



    // ─── Sequência: Toast → Scanner → Modal ───────────────────────────────────
    const devToast      = document.getElementById('dev-toast');
    const closeToast    = document.getElementById('close-toast');
    const techTracker   = document.getElementById('tech-tracker');
    const privacyModal  = document.getElementById('privacy-modal');

    // Desktop-only — não executa em mobile
    if (window.innerWidth <= 1024) return;

    // ── Web Audio helpers ──────────────────────────────────────────────────────
    let audioCtx = null;
    try { audioCtx = (window.AudioContext || window.webkitAudioContext) ? new (window.AudioContext || window.webkitAudioContext)() : null; } catch(e) {}

    // Desbloquear áudio após primeira interação do utilizador
    function unlockAudio() {
        if (audioCtx && audioCtx.state === 'suspended') {
            audioCtx.resume();
        }
    }
    document.addEventListener('click', unlockAudio, { once: true });
    document.addEventListener('touchend', unlockAudio, { once: true });

    function playSound(type) {
        if (!audioCtx || audioCtx.state === 'suspended') return;
        const now = audioCtx.currentTime;

        if (type === 'toast-in') {
            // Ping suave ascendente
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.connect(gain); gain.connect(audioCtx.destination);
            osc.type = 'sine';
            osc.frequency.setValueAtTime(440, now);
            osc.frequency.exponentialRampToValueAtTime(880, now + 0.18);
            gain.gain.setValueAtTime(0.18, now);
            gain.gain.exponentialRampToValueAtTime(0.001, now + 0.45);
            osc.start(now); osc.stop(now + 0.45);
        }

        if (type === 'toast-out') {
            // Ping descendente suave
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.connect(gain); gain.connect(audioCtx.destination);
            osc.type = 'sine';
            osc.frequency.setValueAtTime(660, now);
            osc.frequency.exponentialRampToValueAtTime(330, now + 0.22);
            gain.gain.setValueAtTime(0.12, now);
            gain.gain.exponentialRampToValueAtTime(0.001, now + 0.35);
            osc.start(now); osc.stop(now + 0.35);
        }

        if (type === 'scanner-in') {
            // Beep tech sequencial
            [0, 0.12, 0.24].forEach((delay, i) => {
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.connect(gain); gain.connect(audioCtx.destination);
                osc.type = 'square';
                osc.frequency.setValueAtTime(440 + i * 110, now + delay);
                gain.gain.setValueAtTime(0.06, now + delay);
                gain.gain.exponentialRampToValueAtTime(0.001, now + delay + 0.1);
                osc.start(now + delay); osc.stop(now + delay + 0.1);
            });
        }

        if (type === 'modal-in') {
            // Acorde suave
            [261, 329, 392].forEach((freq, i) => {
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.connect(gain); gain.connect(audioCtx.destination);
                osc.type = 'sine';
                osc.frequency.setValueAtTime(freq, now + i * 0.06);
                gain.gain.setValueAtTime(0.1, now + i * 0.06);
                gain.gain.exponentialRampToValueAtTime(0.001, now + i * 0.06 + 0.6);
                osc.start(now + i * 0.06); osc.stop(now + i * 0.06 + 0.6);
            });
        }
    }

    // ── 1. TOAST ───────────────────────────────────────────────────────────────
    function dismissToast(then) {
        if (!devToast) return;
        playSound('toast-out');
        devToast.classList.remove('visible');
        setTimeout(then, 600);
    }

    if (devToast) {
        setTimeout(() => {
            devToast.classList.add('visible');
            playSound('toast-in');

            // Animação de atenção 1.2s após aparecer
            setTimeout(() => {
                devToast.classList.add('attention');
                devToast.addEventListener('animationend', () => {
                    devToast.classList.remove('attention');
                }, { once: true });
            }, 1200);

        }, 1500);
    }

    // Fechar manualmente
    if (closeToast) closeToast.addEventListener('click', () => {
        dismissToast(startScanner);
    });

    // Auto-fechar após 9 s
    if (devToast) setTimeout(() => {
        if (devToast.classList.contains('visible')) {
            dismissToast(startScanner);
        }
    }, 9000);

    // ── 2. SCANNER ─────────────────────────────────────────────────────────────
    function startScanner() {
        if (!techTracker) { startModal(); return; }

        setTimeout(() => {
            techTracker.classList.remove('collapsed');
            playSound('scanner-in');
            if (window.hackherDetect) window.hackherDetect();

            // Auto-fechar scanner e abrir modal
            setTimeout(() => {
                techTracker.classList.add('collapsed');
                setTimeout(startModal, 900);
            }, 7000);
        }, 400);
    }

    // ── 3. MODAL ───────────────────────────────────────────────────────────────
    function startModal() {
        if (!privacyModal) return;
        privacyModal.classList.add('visible');
        playSound('modal-in');
    }

    // Fechar modal (listeners centralizados aqui para evitar problemas com CSP)
    var closePrivacyBtn = document.getElementById('close-privacy-modal');
    if (closePrivacyBtn) closePrivacyBtn.addEventListener('click', function () {
        if (privacyModal) privacyModal.classList.remove('visible');
    });
    if (privacyModal) privacyModal.addEventListener('click', function (e) {
        if (e.target === privacyModal || (e.target.classList && e.target.classList.contains('pm-backdrop'))) {
            privacyModal.classList.remove('visible');
        }
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && privacyModal) privacyModal.classList.remove('visible');
    });


      // Tab switching functionality
      const tabButtons = document.querySelectorAll('.tab-button');
      const tabContents = document.querySelectorAll('.tab-content');

      tabButtons.forEach(button => {
          button.addEventListener('click', () => {
              // Remove active class from all tabs
              tabButtons.forEach(btn => btn.classList.remove('active'));
              // Add active class to clicked tab
              button.classList.add('active');

              // Hide all tab contents
              tabContents.forEach(content => content.classList.remove('active'));

              // Show the corresponding tab content
              const tabId = `${button.dataset.tab}-tab`;
              document.getElementById(tabId).classList.add('active');
          });
      });
     // Tab switching functionality


    //  / Botão "Ver Mais" para certificações
    const viewMoreBtn = document.querySelector('.view-more-btn');
    if (viewMoreBtn) {
        viewMoreBtn.addEventListener('click', function() {
            const certGrid = document.querySelector('.certification-grid');
            // Toggle classe para expandir/contrair o grid
            certGrid.classList.toggle('expanded');

            // Alterar texto do botão
            if (certGrid.classList.contains('expanded')) {
                viewMoreBtn.querySelector('span').textContent = 'Ver Menos';
                viewMoreBtn.querySelector('.btn-icon svg').style.transform = 'rotate(180deg)';
            } else {
                viewMoreBtn.querySelector('span').textContent = 'Ver Mais Certificações';
                viewMoreBtn.querySelector('.btn-icon svg').style.transform = 'rotate(0)';
            }
        });
    }


    // Cache force refresh
    function forceRefresh() {
        window.location.reload(true);
      }
});


/**
 * Script de rastreamento de visitantes - Versão essencial
 * Por Arnaldo Tomo
 */

document.addEventListener('DOMContentLoaded', function() {
    // Inicialização
    setupTracking();
});

// Configuração do sistema de rastreamento
function setupTracking() {
    // Executa a detecção completa assim que a página carregar
    refreshData();

    // Monitora o status da detecção e envia os dados quando concluído
    const checkDetectionStatus = setInterval(() => {
        const locationStatus = document.getElementById('visitor-location').textContent;
        const browserStatus = document.getElementById('browser-info').textContent;

        if (locationStatus !== 'Detectando...' && browserStatus !== 'Detectando...') {
            console.log('Detecção concluída, enviando dados para o servidor...');
            clearInterval(checkDetectionStatus);
            sendTrackingDataToServer();
        } else {
            console.log('Ainda detectando dados...');
            refreshData();
        }
    }, 3000);

    // Timeout máximo para enviar os dados disponíveis
    setTimeout(() => {
        clearInterval(checkDetectionStatus);
        console.log('Timeout máximo atingido, enviando dados disponíveis...');
        sendTrackingDataToServer();
    }, 15000);
}


// Coleta todos os dados para enviar ao servidor
function collectTrackingData() {
    return {
        // Informações do visitante
        location: document.getElementById('visitor-location').textContent,
        isp: document.getElementById('visitor-isp').textContent,

        // Informações do sistema
        device_type: document.getElementById('device-type').textContent,
        os_info: document.getElementById('os-info').textContent,
        screen_resolution: document.getElementById('screen-resolution').textContent,
        color_depth: document.getElementById('color-depth').textContent,
        pixel_ratio: document.getElementById('pixel-ratio').textContent,
        device_memory: document.getElementById('device-memory').textContent,
        dark_mode: document.getElementById('dark-mode').textContent,

        // Informações do navegador
        browser_info: document.getElementById('browser-info').textContent,
        browser_engine: document.getElementById('browser-engine').textContent,
        browser_language: document.getElementById('browser-language').textContent,
        cookies_enabled: document.getElementById('cookies-enabled').textContent,
        do_not_track: document.getElementById('do-not-track').textContent,
        viewport_size: document.getElementById('viewport-size').textContent,

        // Informações de conexão
        connection_type: document.getElementById('connection-type').textContent,
        connection_speed: document.getElementById('connection-speed').textContent,
        page_load_time: document.getElementById('page-load-time').textContent,
        network_latency: document.getElementById('network-latency').textContent,

        // Recursos suportados
        webgl_support: document.getElementById('feature-webgl').classList.contains('available'),
        canvas_support: document.getElementById('feature-canvas').classList.contains('available'),
        webrtc_support: document.getElementById('feature-webrtc').classList.contains('available'),
        webworker_support: document.getElementById('feature-webworker').classList.contains('available'),
        geolocation_support: document.getElementById('feature-geolocation').classList.contains('available'),
        touch_support: document.getElementById('feature-touch').classList.contains('available'),
        notifications_support: document.getElementById('feature-notifications').classList.contains('available'),
        webcam_support: document.getElementById('feature-webcam').classList.contains('available'),

        // Status da bateria
        battery_status: document.getElementById('battery-status').textContent,

        // Informações da página
        page_url: window.location.href,
        referrer_url: document.referrer || 'Direto'
    };
}

// Envia dados ao servidor
function sendTrackingDataToServer() {
    // Verifica se os dados estão prontos
    const trackingData = collectTrackingData();

    // Filtra valores "Detectando..."
    for (const key in trackingData) {
        if (trackingData[key] === 'Detectando...') {
            console.log(`Campo ${key} ainda não detectado completamente`);
        }
    }

    // Obtém token CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Envia dados para o servidor
    fetch('/visitor-tracking', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify(trackingData)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Dados do visitante salvos com sucesso:', data);
    })
    .catch(error => {
        console.error('Erro ao salvar dados do visitante:', error);
    });
}
