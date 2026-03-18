<style>
  /* ── Botão de apresentação — alinhado à esquerda do WhatsApp ── */
  .ap-btn {
    position: fixed;
    bottom: 30px;
    right: 110px; /* 70 (wa right) + 32 (wa width) + 8 (gap) */
    z-index: 9990;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(10,15,28,0.75);
    border: 1px solid rgba(255,255,255,0.14);
    backdrop-filter: blur(12px);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    color: rgba(255,255,255,0.6);
  }
  .ap-btn:hover { background: rgba(0,184,212,0.2); border-color: rgba(0,184,212,0.4); color: #00b8d4; transform: scale(1.1); }
  .ap-btn.ap-active { background: rgba(0,184,212,0.25); border-color: rgba(0,184,212,0.6); color: #00b8d4; }

  /* Tooltip */
  .ap-btn::after {
    content: 'Apresentação';
    position: absolute;
    bottom: 38px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(10,15,28,0.9);
    color: rgba(255,255,255,0.85);
    font-family: 'Poppins', sans-serif;
    font-size: 10px;
    font-weight: 500;
    padding: 4px 10px;
    border-radius: 8px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease;
  }
  .ap-btn:hover::after { opacity: 1; }

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
  <!-- Ícone: ecrã de apresentação (idle) -->
  <svg id="ap-icon-play" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
    <rect x="2" y="3" width="20" height="14" rx="2"/>
    <polyline points="8,21 12,17 16,21"/>
    <line x1="12" y1="17" x2="12" y2="3"/>
    <polygon points="10,8 14,10 10,12" fill="currentColor" stroke="none"/>
  </svg>
  <!-- Ícone: parar -->
  <svg id="ap-icon-stop" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:none">
    <rect x="2" y="3" width="20" height="14" rx="2"/>
    <polyline points="8,21 12,17 16,21"/>
    <rect x="9" y="7" width="6" height="6" rx="1" fill="currentColor" stroke="none"/>
  </svg>
</button>

<!-- Barra de progresso -->
<div class="ap-progress-wrap" id="ap-progress-wrap">
  <div class="ap-progress-bar" id="ap-progress-bar"></div>
</div>

<!-- Indicador de secção actual -->
<div class="ap-section-indicator" id="ap-section-indicator"></div>

<script src="/js/autopresent.js?v=<?= filemtime(public_path('js/autopresent.js')) ?>"></script>
