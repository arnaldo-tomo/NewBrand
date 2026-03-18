(function () {
    var codes = {
        0:  '☀️', 1: '🌤️', 2: '⛅', 3: '☁️',
        45: '🌫️', 48: '🌫️',
        51: '🌦️', 53: '🌦️', 55: '🌧️',
        61: '🌧️', 63: '🌧️', 65: '🌧️',
        71: '❄️', 73: '❄️', 75: '❄️', 77: '🌨️',
        80: '🌦️', 81: '🌧️', 82: '⛈️',
        85: '🌨️', 86: '🌨️',
        95: '⛈️', 96: '⛈️', 99: '⛈️',
    };

    var loaded = false;

    function el(id) { return document.getElementById(id); }

    function wtFetch() {
        fetch('/api/weather')
            .then(function (r) { return r.json(); })
            .then(function (d) {
                if (!d || !d.ok) return;
                el('wt-icon').textContent = codes[d.code] || '🌡️';
                el('wt-temp').textContent = d.temp + '°';
                if (el('wt-city')) el('wt-city').textContent = d.city || '—';
                loaded = true;
            })
            .catch(function () {});
    }

    function isHome() {
        var active = document.querySelector('.vlt-section.active[data-anchor]');
        return !active || active.getAttribute('data-anchor') === 'Home';
    }

    function sync() {
        var widget   = el('wt-widget');
        var scrollEl = document.querySelector('.scroll-indicator-wrap');
        if (!widget) return;

        if (isHome()) {
            widget.classList.remove('wt-visible');
            if (scrollEl) scrollEl.classList.remove('si-hidden');
        } else {
            if (loaded) widget.classList.add('wt-visible');
            if (scrollEl) scrollEl.classList.add('si-hidden');
        }
    }

    function watchSections() {
        // Observar todas as secções para mudança de classe .active
        document.querySelectorAll('.vlt-section[data-anchor]').forEach(function (s) {
            new MutationObserver(sync).observe(s, { attributes: true, attributeFilter: ['class'] });
        });
        sync();
    }

    function init() {
        wtFetch();
        watchSections();
        setInterval(wtFetch, 1800000);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
