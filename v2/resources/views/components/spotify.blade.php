<style>
  .sp-widget {
    position: fixed;
    bottom: 28px;
    right: 28px;
    z-index: 9998;
    width: 260px;
    background: rgba(10,15,28,0.88);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 16px;
    padding: 12px 14px;
    display: flex;
    align-items: center;
    gap: 11px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.5);
    opacity: 0;
    transform: translateY(12px);
    transition: opacity 0.4s ease, transform 0.4s ease;
    pointer-events: none;
  }
  .sp-widget.sp-visible { opacity: 1; transform: translateY(0); pointer-events: auto; }

  .sp-cover {
    width: 44px; height: 44px;
    border-radius: 8px;
    object-fit: cover;
    flex-shrink: 0;
    background: #1a2035;
  }
  .sp-cover-placeholder {
    width: 44px; height: 44px;
    border-radius: 8px;
    background: rgba(30,215,96,0.1);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .sp-info { flex: 1; min-width: 0; }

  .sp-label {
    display: flex; align-items: center; gap: 5px;
    font-size: 9px; font-weight: 600; letter-spacing: 0.08em;
    text-transform: uppercase; color: #1ed760; margin-bottom: 3px;
  }
  .sp-bars {
    display: flex; align-items: flex-end; gap: 2px; height: 10px;
  }
  .sp-bar {
    width: 2.5px; background: #1ed760; border-radius: 1px;
    animation: sp-dance 0.8s ease-in-out infinite alternate;
  }
  .sp-bar:nth-child(2) { animation-delay: 0.15s; }
  .sp-bar:nth-child(3) { animation-delay: 0.3s; }
  @keyframes sp-dance {
    from { height: 3px; } to { height: 10px; }
  }

  .sp-title {
    font-size: 12px; font-weight: 600; color: #fff;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    line-height: 1.3;
  }
  .sp-artist {
    font-size: 10px; color: rgba(255,255,255,0.45);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
  }

  .sp-progress-track {
    height: 2px; background: rgba(255,255,255,0.1);
    border-radius: 1px; margin-top: 6px;
  }
  .sp-progress-fill {
    height: 100%; background: #1ed760;
    border-radius: 1px; width: 0%;
    transition: width 1s linear;
  }

  .sp-link {
    color: rgba(255,255,255,0.3);
    transition: color 0.2s;
    flex-shrink: 0;
  }
  .sp-link:hover { color: #1ed760; }

  @media (max-width: 768px) { .sp-widget { display: none; } }
</style>

<div class="sp-widget" id="sp-widget">
  <div class="sp-cover-placeholder" id="sp-cover-wrap">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="#1ed760">
      <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4.586 14.424a.623.623 0 01-.857.207c-2.348-1.435-5.304-1.76-8.785-.964a.623.623 0 01-.277-1.215c3.809-.87 7.076-.496 9.712 1.115.294.181.387.565.207.857zm1.223-2.722a.78.78 0 01-1.072.257C14.15 12.19 10.95 11.76 7.4 12.76a.782.782 0 01-.408-1.51c3.991-1.08 7.555-.557 10.407 1.277a.78.78 0 01.41.175zM17.93 11a.935.935 0 01-1.285.31C14.01 9.5 9.52 9.07 6.16 10.07a.936.936 0 01-.543-1.79c3.81-1.154 8.78-.635 11.993 1.406a.935.935 0 01.32 1.314z"/>
    </svg>
  </div>
  <div class="sp-info">
    <div class="sp-label">
      <div class="sp-bars">
        <div class="sp-bar"></div>
        <div class="sp-bar"></div>
        <div class="sp-bar"></div>
      </div>
      A ouvir agora
    </div>
    <div class="sp-title" id="sp-title">—</div>
    <div class="sp-artist" id="sp-artist">—</div>
    <div class="sp-progress-track">
      <div class="sp-progress-fill" id="sp-progress"></div>
    </div>
  </div>
  <a href="#" target="_blank" rel="noopener" class="sp-link" id="sp-link" title="Abrir no Spotify">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
      <path d="M10 6v2H5v11h11v-5h2v7H3V6h7zm11-3v8h-2V6.413l-7.793 7.794-1.414-1.414L17.585 5H13V3h8z"/>
    </svg>
  </a>
</div>

<script>
(function () {
    var widget   = document.getElementById('sp-widget');
    var titleEl  = document.getElementById('sp-title');
    var artistEl = document.getElementById('sp-artist');
    var progEl   = document.getElementById('sp-progress');
    var linkEl   = document.getElementById('sp-link');
    var coverWrap= document.getElementById('sp-cover-wrap');
    var lastImg  = null;

    function fetchNow() {
        fetch('/api/spotify/now-playing')
            .then(function (r) { return r.json(); })
            .then(function (d) {
                if (!d.playing) { widget.classList.remove('sp-visible'); return; }

                titleEl.textContent  = d.title;
                artistEl.textContent = d.artist;
                linkEl.href          = d.url;
                if (d.duration > 0) {
                    progEl.style.width = ((d.progress / d.duration) * 100).toFixed(1) + '%';
                }

                // Capa do álbum
                if (d.cover && d.cover !== lastImg) {
                    lastImg = d.cover;
                    var img = document.createElement('img');
                    img.src = d.cover;
                    img.className = 'sp-cover';
                    img.alt = d.album;
                    coverWrap.replaceWith(img);
                    coverWrap = img;
                    coverWrap.id = 'sp-cover-wrap';
                }

                widget.classList.add('sp-visible');
            })
            .catch(function () { /* silencioso */ });
    }

    // Primeira chamada e depois a cada 30 s
    fetchNow();
    setInterval(fetchNow, 30000);
})();
</script>
