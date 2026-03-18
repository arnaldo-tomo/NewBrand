<style>
  .sp-widget {
    position: fixed;
    bottom: 92px;
    right: 30px;
    z-index: 9997;
    width: 270px;
    background: rgba(8,12,24,0.92);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(30,215,96,0.25);
    border-radius: 14px;
    padding: 11px 13px;
    align-items: center;
    gap: 11px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.5);
    opacity: 0;
    visibility: hidden;
    transform: translateY(8px);
    transition: opacity 0.35s ease, visibility 0.35s ease, transform 0.35s ease;
    /* Usar flex sempre — controlo por opacity/visibility */
    display: flex;
  }
  .sp-widget.sp-on {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .sp-cover {
    width: 46px; height: 46px;
    border-radius: 8px; object-fit: cover; flex-shrink: 0;
  }
  .sp-cover-ph {
    width: 46px; height: 46px; border-radius: 8px;
    background: rgba(30,215,96,0.08);
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
  }
  .sp-info { flex: 1; min-width: 0; }
  .sp-label {
    display: flex; align-items: center; gap: 5px;
    font-size: 9px; font-weight: 600; letter-spacing: 0.07em;
    text-transform: uppercase; color: #1ed760; margin-bottom: 3px;
    font-family: 'Poppins', sans-serif;
  }
  .sp-bars { display: flex; align-items: flex-end; gap: 2px; height: 9px; }
  .sp-bar  { width: 2px; background: #1ed760; border-radius: 1px; animation: sp-b 0.7s ease-in-out infinite alternate; }
  .sp-bar:nth-child(2) { animation-delay: 0.15s; }
  .sp-bar:nth-child(3) { animation-delay: 0.3s; }
  @keyframes sp-b { from { height: 2px; } to { height: 9px; } }
  .sp-title  { font-size: 12px; font-weight: 600; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-family: 'Poppins', sans-serif; line-height: 1.3; }
  .sp-artist { font-size: 10px; color: rgba(255,255,255,0.42); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-family: 'Poppins', sans-serif; }
  .sp-prog { height: 2px; background: rgba(255,255,255,0.1); border-radius: 1px; margin-top: 5px; }
  .sp-prog-bar { height: 100%; background: #1ed760; border-radius: 1px; width: 0%; transition: width 1s linear; }
  .sp-ext { color: rgba(255,255,255,0.28); flex-shrink: 0; transition: color 0.2s; }
  .sp-ext:hover { color: #1ed760; }

  @media (max-width: 1024px) { .sp-widget { display: none !important; } }
</style>

<div id="sp-widget" class="sp-widget">
  <div class="sp-cover-ph" id="sp-coverEl">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="#1ed760" opacity="0.5">
      <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4.586 14.424a.623.623 0 01-.857.207c-2.348-1.435-5.304-1.76-8.785-.964a.623.623 0 01-.277-1.215c3.809-.87 7.076-.496 9.712 1.115.294.181.387.565.207.857zm1.223-2.722a.78.78 0 01-1.072.257C14.15 12.19 10.95 11.76 7.4 12.76a.782.782 0 01-.408-1.51c3.991-1.08 7.555-.557 10.407 1.277a.78.78 0 01.41.175zM17.93 11a.935.935 0 01-1.285.31C14.01 9.5 9.52 9.07 6.16 10.07a.936.936 0 01-.543-1.79c3.81-1.154 8.78-.635 11.993 1.406a.935.935 0 01.32 1.314z"/>
    </svg>
  </div>
  <div class="sp-info">
    <div class="sp-label">
      <div class="sp-bars"><div class="sp-bar"></div><div class="sp-bar"></div><div class="sp-bar"></div></div>
      A ouvir agora
    </div>
    <div class="sp-title" id="sp-titleEl">—</div>
    <div class="sp-artist" id="sp-artistEl">—</div>
    <div class="sp-prog"><div class="sp-prog-bar" id="sp-progEl"></div></div>
  </div>
  <a href="#" target="_blank" rel="noopener" id="sp-linkEl" class="sp-ext">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M10 6v2H5v11h11v-5h2v7H3V6h7zm11-3v8h-2V6.413l-7.793 7.794-1.414-1.414L17.585 5H13V3h8z"/></svg>
  </a>
</div>

<script>
(function () {
    var _cover  = null; // URL da capa em uso

    function setText(id, val) {
        var el = document.getElementById(id);
        if (el) el.textContent = val;
    }

    function spFetch() {
        fetch('/api/spotify/now-playing')
            .then(function(r) { return r.json(); })
            .then(function(d) {
                var widget = document.getElementById('sp-widget');
                if (!widget) return;

                if (!d || !d.playing) {
                    widget.classList.remove('sp-on');
                    return;
                }

                // Textos
                setText('sp-titleEl',  d.title  || '—');
                setText('sp-artistEl', d.artist || '—');

                // Link
                var lnk = document.getElementById('sp-linkEl');
                if (lnk) lnk.href = d.url || '#';

                // Progresso
                if (d.duration > 0) {
                    var prog = document.getElementById('sp-progEl');
                    if (prog) prog.style.width = ((d.progress / d.duration) * 100).toFixed(1) + '%';
                }

                // Capa do álbum
                if (d.cover && d.cover !== _cover) {
                    _cover = d.cover;
                    var coverEl = document.getElementById('sp-coverEl');
                    if (coverEl) {
                        var img = new Image();
                        img.className = 'sp-cover';
                        img.id = 'sp-coverEl';
                        img.alt = '';
                        img.src = d.cover;
                        coverEl.parentNode.replaceChild(img, coverEl);
                    }
                }

                // Mostrar widget
                widget.classList.add('sp-on');
            })
            .catch(function() { /* silencioso */ });
    }

    // Iniciar após DOM estar pronto
    function init() { spFetch(); setInterval(spFetch, 30000); }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
