/* Hackher — Sua Pegada Digital */
(function () {

    /* ── TABS ── */
    window.hackherTab = function (name, btn) {
        ['system', 'browser', 'network', 'features'].forEach(function (p) {
            var el = document.getElementById('tab-' + p);
            if (el) el.style.display = p === name ? 'block' : 'none';
        });
        document.querySelectorAll('.tracker-tab').forEach(function (t) {
            t.classList.remove('active');
        });
        if (btn) btn.classList.add('active');
    };

    /* ── DETECT ── */
    window.hackherDetect = function () {
        var ua = navigator.userAgent;

        function set(id, val) {
            var el = document.getElementById(id);
            if (el) el.textContent = val;
        }
        function feat(id, ok) {
            var el = document.getElementById(id);
            if (!el) return;
            el.classList[ok ? 'add' : 'remove']('available');
        }

        /* Browser */
        var bn = 'Desconhecido', bv = '';
        try {
            if (/Edg\//.test(ua))          { bn = 'Edge';    bv = (ua.match(/Edg\/([\d.]+)/) || [])[1] || ''; }
            else if (/OPR\//.test(ua))     { bn = 'Opera';   bv = (ua.match(/OPR\/([\d.]+)/) || [])[1] || ''; }
            else if (/Firefox\//.test(ua)) { bn = 'Firefox'; bv = (ua.match(/Firefox\/([\d.]+)/) || [])[1] || ''; }
            else if (/Chrome\//.test(ua))  { bn = 'Chrome';  bv = (ua.match(/Chrome\/([\d.]+)/) || [])[1] || ''; }
            else if (/Safari\//.test(ua))  { bn = 'Safari';  bv = (ua.match(/Version\/([\d.]+)/) || [])[1] || ''; }
        } catch (e) {}
        set('browser-info', bn + (bv ? ' ' + bv : ''));

        set('browser-engine',
            /Firefox/.test(ua) ? 'Gecko' :
            /AppleWebKit/.test(ua) ? 'WebKit' :
            /Trident/.test(ua) ? 'Trident' : 'Desconhecido');

        set('browser-language', navigator.language || '—');
        set('cookies-enabled', navigator.cookieEnabled ? 'Habilitados' : 'Desabilitados');
        var dnt = navigator.doNotTrack || window.doNotTrack;
        set('do-not-track', (dnt === '1' || dnt === 'yes') ? 'Ativado' : 'Desativado');
        set('viewport-size', window.innerWidth + 'x' + window.innerHeight);

        /* OS & Device */
        var os = 'Desconhecido', osV = '';
        if      (/Windows NT 10/.test(ua))        { os = 'Windows'; osV = '10/11'; }
        else if (/Windows/.test(ua))               { os = 'Windows'; }
        else if (/iPhone|iPad|iPod/.test(ua))      { os = 'iOS';     var r1 = ua.match(/OS ([\d_]+)/);     if (r1) osV = r1[1].replace(/_/g, '.'); }
        else if (/Android/.test(ua))               { os = 'Android'; var r2 = ua.match(/Android ([\d.]+)/); if (r2) osV = r2[1]; }
        else if (/Mac OS X/.test(ua))              { os = 'macOS';   var r3 = ua.match(/Mac OS X ([\d_]+)/); if (r3) osV = r3[1].replace(/_/g, '.'); }
        else if (/Linux/.test(ua))                 { os = 'Linux'; }
        set('os-info', os + (osV ? ' ' + osV : ''));

        set('device-type',
            /Mobi|Android.*Mobile/.test(ua) ? 'Smartphone' :
            /iPad|Android(?!.*Mobile)/.test(ua) ? 'Tablet' : 'Desktop');

        set('screen-resolution', screen.width + 'x' + screen.height);
        set('color-depth', screen.colorDepth + ' bits');
        set('pixel-ratio', (window.devicePixelRatio || 1).toFixed(2) + 'x');
        set('device-memory', navigator.deviceMemory ? navigator.deviceMemory + ' GB' : 'N/A');
        set('dark-mode', window.matchMedia('(prefers-color-scheme: dark)').matches ? 'Ativado' : 'Desativado');

        /* Connection */
        var conn = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
        if (conn) {
            set('connection-type', conn.effectiveType || conn.type || '—');
            set('connection-speed', conn.downlink != null ? conn.downlink + ' Mbps' : '—');
        } else {
            set('connection-type', 'N/A');
            set('connection-speed', 'N/A');
        }

        if (window.performance && performance.timing) {
            var ms = performance.timing.domContentLoadedEventEnd - performance.timing.navigationStart;
            if (ms > 0) set('page-load-time', (ms / 1000).toFixed(2) + 's');
        }

        /* Latency */
        var t0 = Date.now();
        fetch(window.location.href, { method: 'HEAD', cache: 'no-store' })
            .then(function () { set('network-latency', (Date.now() - t0) + ' ms'); })
            .catch(function () { set('network-latency', '—'); });

        /* Battery */
        if (navigator.getBattery) {
            navigator.getBattery().then(function (b) {
                set('battery-status', Math.floor(b.level * 100) + '% (' + (b.charging ? 'carregando' : 'sem carregar') + ')');
            }).catch(function () { set('battery-status', 'N/A'); });
        } else { set('battery-status', 'N/A'); }

        /* Geolocation via proxy local (evita CSP/CORS) */
        set('visitor-location', 'Detectando...');
        set('visitor-isp', 'Detectando...');
        fetch('/api/geo')
            .then(function (r) { return r.json(); })
            .then(function (d) {
                set('visitor-location', (d.city || '?') + ', ' + (d.country || '?'));
                set('visitor-isp', d.isp || '—');
            })
            .catch(function () {
                set('visitor-location', 'N/D');
                set('visitor-isp', 'N/D');
            });

        /* Browser features */
        try { var cv = document.createElement('canvas'); feat('feature-webgl', !!(cv.getContext('webgl') || cv.getContext('experimental-webgl'))); } catch (e) { feat('feature-webgl', false); }
        try { var cv2 = document.createElement('canvas'); feat('feature-canvas', !!(cv2.getContext && cv2.getContext('2d'))); } catch (e) { feat('feature-canvas', false); }
        feat('feature-webrtc', !!(window.RTCPeerConnection || window.webkitRTCPeerConnection));
        feat('feature-webworker', !!window.Worker);
        feat('feature-geolocation', !!navigator.geolocation);
        feat('feature-touch', 'ontouchstart' in window || (navigator.maxTouchPoints || 0) > 0);
        feat('feature-notifications', 'Notification' in window);
        feat('feature-webcam', !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia));

        /* Timer */
        if (!window._hackherTimer) {
            var sec = 0;
            window._hackherTimer = setInterval(function () {
                sec++;
                var m = Math.floor(sec / 60), s = sec % 60;
                set('time-on-page', (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s);
            }, 1000);
        }
    };

    /* Open toggle → detect */
    var tog = document.querySelector('.tech-tracker-toggle');
    if (tog) {
        tog.addEventListener('click', function () {
            setTimeout(function () {
                var tr = document.getElementById('tech-tracker');
                if (tr && !tr.classList.contains('collapsed')) window.hackherDetect();
            }, 120);
        });
    }

    /* Run once on load */
    window.hackherDetect();

})();
