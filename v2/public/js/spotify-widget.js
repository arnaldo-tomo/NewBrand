(function () {
    var _cover = null;

    function setText(id, val) {
        var el = document.getElementById(id);
        if (el) el.textContent = val;
    }

    function spFetch() {
        fetch('/api/spotify/now-playing')
            .then(function(r) { return r.json(); })
            .then(function(d) {
                try {
                    var widget = document.getElementById('sp-widget');
                    console.log('[SP] widget el:', widget, '| playing:', d && d.playing);
                    if (!widget) return;

                    if (!d || !d.playing) { widget.classList.remove('sp-on'); return; }

                    setText('sp-titleEl',  d.title  || '—');
                    setText('sp-artistEl', d.artist || '—');

                    var lnk = document.getElementById('sp-linkEl');
                    if (lnk) lnk.href = d.url || '#';

                    if (d.duration > 0) {
                        var prog = document.getElementById('sp-progEl');
                        if (prog) prog.style.width = ((d.progress / d.duration) * 100).toFixed(1) + '%';
                    }

                    if (d.cover && d.cover !== _cover) {
                        _cover = d.cover;
                        var coverEl = document.getElementById('sp-coverEl');
                        if (coverEl && coverEl.parentNode) {
                            var img = new Image();
                            img.className = 'sp-cover';
                            img.id = 'sp-coverEl';
                            img.alt = '';
                            img.src = d.cover;
                            coverEl.parentNode.replaceChild(img, coverEl);
                        }
                    }

                    console.log('[SP] adding sp-on class');
                    widget.classList.add('sp-on');
                    console.log('[SP] classes now:', widget.className);
                } catch(err) {
                    console.error('[SP] erro no update:', err);
                }
            })
            .catch(function(e) { console.error('[SP] fetch erro:', e); });
    }

    function syncDocked() {
        var tracker = document.getElementById('tech-tracker');
        var widget  = document.getElementById('sp-widget');
        if (!tracker || !widget) return;
        var isOpen = !tracker.classList.contains('collapsed');
        if (isOpen) widget.classList.add('sp-docked');
        else        widget.classList.remove('sp-docked');
    }

    function watchTracker() {
        var tracker = document.getElementById('tech-tracker');
        if (!tracker) { setTimeout(watchTracker, 400); return; }
        new MutationObserver(syncDocked).observe(tracker, { attributes: true, attributeFilter: ['class'] });
        syncDocked();
    }

    function init() {
        spFetch();
        setInterval(spFetch, 30000);
        watchTracker();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
