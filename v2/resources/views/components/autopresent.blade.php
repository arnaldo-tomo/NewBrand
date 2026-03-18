<style>
  /* ── Botão de apresentação ── */
  .ap-btn {
    position: fixed;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    z-index: 9990;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(10,15,28,0.7);
    border: 1px solid rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    color: rgba(255,255,255,0.5);
  }
  .ap-btn:hover { background: rgba(0,184,212,0.2); border-color: rgba(0,184,212,0.4); color: #00b8d4; transform: translateY(-50%) scale(1.1); }
  .ap-btn.ap-active { background: rgba(0,184,212,0.25); border-color: rgba(0,184,212,0.6); color: #00b8d4; }

  /* ── Barra de progresso ── */
  .ap-progress-wrap {
    position: fixed;
    bottom: 0; left: 0; right: 0;
    z-index: 9991;
    height: 3px;
    background: rgba(255,255,255,0.06);
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  .ap-progress-wrap.ap-visible { opacity: 1; }
  .ap-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #00b8d4, #0ea5e9);
    width: 0%;
    transition: width linear;
  }

  /* ── Overlay de secção ── */
  .ap-section-indicator {
    position: fixed;
    top: 20px; left: 50%;
    transform: translateX(-50%);
    z-index: 9992;
    background: rgba(10,15,28,0.8);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(0,184,212,0.3);
    border-radius: 20px;
    padding: 6px 18px;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 500;
    color: #00b8d4;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }
  .ap-section-indicator.ap-visible { opacity: 1; }

  @media (max-width: 1024px) { .ap-btn, .ap-progress-wrap, .ap-section-indicator { display: none; } }
</style>

<!-- Botão play/stop -->
<button class="ap-btn" id="ap-btn" title="Modo de Apresentação" onclick="togglePresentation()">
  <svg id="ap-icon-play" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
    <path d="M8 5v14l11-7z"/>
  </svg>
  <svg id="ap-icon-stop" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="display:none">
    <rect x="6" y="6" width="12" height="12" rx="2"/>
  </svg>
</button>

<!-- Barra de progresso -->
<div class="ap-progress-wrap" id="ap-progress-wrap">
  <div class="ap-progress-bar" id="ap-progress-bar"></div>
</div>

<!-- Indicador de secção actual -->
<div class="ap-section-indicator" id="ap-section-indicator"></div>

<script>
(function () {
    var INTERVAL   = 6000; // ms por secção
    var sections   = ['Home', 'About', 'Projects', 'Education', 'Blog', 'Packages', 'Contact'];
    var labels     = { Home: 'Início', About: 'Sobre', Projects: 'Projetos', Education: 'Educação', Blog: 'Blog', Packages: 'Packages', Contact: 'Contacto' };
    var current    = 0;
    var timer      = null;
    var progTimer  = null;
    var running    = false;

    window.togglePresentation = function () {
        running ? stopPresentation() : startPresentation();
    };

    function startPresentation() {
        running = true;
        document.getElementById('ap-btn').classList.add('ap-active');
        document.getElementById('ap-icon-play').style.display = 'none';
        document.getElementById('ap-icon-stop').style.display = 'block';
        document.getElementById('ap-progress-wrap').classList.add('ap-visible');
        document.getElementById('ap-section-indicator').classList.add('ap-visible');

        // Detectar secção actual
        var anchors = document.querySelectorAll('.pp-section[data-anchor]');
        current = 0;
        anchors.forEach(function (s, i) {
            if (!s.classList.contains('pp-scrollable')) return;
            if (s.getBoundingClientRect().top < window.innerHeight / 2) current = i;
        });

        goTo(current);
        document.addEventListener('keydown', onEsc);
    }

    function stopPresentation() {
        running = false;
        clearTimeout(timer);
        clearInterval(progTimer);
        document.getElementById('ap-btn').classList.remove('ap-active');
        document.getElementById('ap-icon-play').style.display = 'block';
        document.getElementById('ap-icon-stop').style.display = 'none';
        document.getElementById('ap-progress-wrap').classList.remove('ap-visible');
        document.getElementById('ap-section-indicator').classList.remove('ap-visible');
        var bar = document.getElementById('ap-progress-bar');
        bar.style.transition = 'none'; bar.style.width = '0%';
        document.removeEventListener('keydown', onEsc);
    }

    function goTo(idx) {
        if (!running) return;
        var anchor = sections[idx];
        if (!anchor) { stopPresentation(); return; }

        // Navegar
        if (typeof $.fn.pagepiling !== 'undefined') {
            $.fn.pagepiling.moveTo(anchor);
        }

        // Actualizar indicador
        document.getElementById('ap-section-indicator').textContent = (idx + 1) + ' / ' + sections.length + '  ·  ' + (labels[anchor] || anchor);

        // Barra de progresso
        var bar = document.getElementById('ap-progress-bar');
        bar.style.transition = 'none'; bar.style.width = '0%';
        setTimeout(function () {
            bar.style.transition = 'width ' + INTERVAL + 'ms linear';
            bar.style.width = '100%';
        }, 30);

        // Próxima secção
        timer = setTimeout(function () {
            current = (idx + 1) % sections.length;
            goTo(current);
        }, INTERVAL);
    }

    function onEsc(e) { if (e.key === 'Escape') stopPresentation(); }
})();
</script>
