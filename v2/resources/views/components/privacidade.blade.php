<style>
  .privacy-modal {
    position: fixed;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10001;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.4s ease, visibility 0.4s ease;
  }
  .privacy-modal.visible { opacity: 1; visibility: visible; }

  /* Desktop-only */
  @media (max-width: 1024px) { .privacy-modal { display: none !important; } }

  .pm-backdrop {
    position: absolute;
    inset: 0;
    z-index: 0;
    background: rgba(4, 8, 18, 0.7);
    backdrop-filter: blur(12px) saturate(140%);
    -webkit-backdrop-filter: blur(12px) saturate(140%);
  }

  .pm-card {
    position: relative;
    z-index: 1;
    width: 420px;
    background: rgba(12, 18, 32, 0.65);
    backdrop-filter: blur(28px) saturate(180%);
    -webkit-backdrop-filter: blur(28px) saturate(180%);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    box-shadow:
      0 32px 64px rgba(0,0,0,0.55),
      0 1px 0 rgba(255,255,255,0.06) inset;
    color: #fff;
    font-family: 'Poppins', -apple-system, sans-serif;
    overflow: hidden;
    transform: translateY(16px) scale(0.97);
    transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1);
  }
  .privacy-modal.visible .pm-card { transform: translateY(0) scale(1); }

  /* Top accent line */
  .pm-card::before {
    content: '';
    display: block;
    height: 2px;
    background: #00b8d4;
    opacity: 0.7;
  }

  .pm-body { padding: 28px 28px 20px; }

  /* Shield icon */
  .pm-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: rgba(0,184,212,0.1);
    border: 1px solid rgba(0,184,212,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
  }

  .pm-title {
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    color: rgba(255,255,255,0.92);
    line-height: 1.5;
    margin: 0 0 6px;
  }

  .pm-sub {
    font-size: 12px;
    text-align: center;
    color: rgba(255,255,255,0.38);
    margin: 0 0 22px;
  }

  /* Logos row */
  .pm-logos {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-bottom: 22px;
  }

  .pm-logo-pill {
    display: flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 20px;
    padding: 5px 10px 5px 7px;
    font-size: 11px;
    font-weight: 500;
    color: rgba(255,255,255,0.65);
  }

  /* Info cards */
  .pm-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    margin-bottom: 18px;
  }

  .pm-item {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 10px;
    padding: 10px 12px;
    font-size: 11.5px;
    color: rgba(255,255,255,0.65);
    line-height: 1.4;
  }

  .pm-item-icon {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: rgba(0,184,212,0.1);
    border: 1px solid rgba(0,184,212,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  /* Quote */
  .pm-quote {
    border-left: 2px solid rgba(0,184,212,0.5);
    padding: 10px 14px;
    margin-bottom: 22px;
    background: rgba(0,184,212,0.04);
    border-radius: 0 8px 8px 0;
    font-size: 12px;
    color: rgba(255,255,255,0.5);
    font-style: italic;
  }
  .pm-quote strong { color: #00b8d4; font-style: normal; }

  /* Footer */
  .pm-footer {
    padding: 0 28px 24px;
    display: flex;
    justify-content: center;
  }

  #close-privacy-modal {
    background: rgba(0,184,212,0.15);
    border: 1px solid rgba(0,184,212,0.35);
    color: #00b8d4;
    padding: 10px 28px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.2s ease;
    font-family: 'Poppins', sans-serif;
    backdrop-filter: blur(6px);
  }
  #close-privacy-modal:hover {
    background: rgba(0,184,212,0.28);
    border-color: rgba(0,184,212,0.6);
    transform: translateY(-1px);
  }
</style>

<div id="privacy-modal" class="privacy-modal">
  <div class="pm-backdrop"></div>
  <div class="pm-card">

    <div class="pm-body">
      <!-- Icon -->
      <div class="pm-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M12 2L3 6V12C3 16.5 7 20.7 12 22C17 20.7 21 16.5 21 12V6L12 2Z" stroke="#00b8d4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M9 12L11 14L15 10" stroke="#00b8d4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>

      <h3 class="pm-title">Um simples website já sabe muito sobre si.</h3>
      <p class="pm-sub">Imagine o que estas plataformas sabem:</p>

      <!-- Logos -->
      <div class="pm-logos">
        <div class="pm-logo-pill">
          <svg width="14" height="14" viewBox="0 0 24 24"><path fill="#EA4335" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/><path fill="#4285F4" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
          Google
        </div>
        <div class="pm-logo-pill">
          <svg width="14" height="14" viewBox="0 0 24 24"><path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Meta
        </div>
        <div class="pm-logo-pill">
          <svg width="14" height="14" viewBox="0 0 24 24"><path fill="#25D366" d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
          WhatsApp
        </div>
      </div>

      <!-- Info grid -->
      <div class="pm-grid">
        <div class="pm-item">
          <div class="pm-item-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M12 12.75a3 3 0 100-6 3 3 0 000 6z" stroke="#00b8d4" stroke-width="1.8"/><path d="M19.5 9.75C19.5 16.5 12 21.75 12 21.75S4.5 16.5 4.5 9.75a7.5 7.5 0 0115 0z" stroke="#00b8d4" stroke-width="1.8"/></svg>
          </div>
          Localização em tempo real
        </div>
        <div class="pm-item">
          <div class="pm-item-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" stroke="#00b8d4" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
          Conversas e mensagens
        </div>
        <div class="pm-item">
          <div class="pm-item-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7M17 13l1.5 7M9 21a1 1 0 100-2 1 1 0 000 2zm9 0a1 1 0 100-2 1 1 0 000 2z" stroke="#00b8d4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          Hábitos de consumo
        </div>
        <div class="pm-item">
          <div class="pm-item-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm14 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="#00b8d4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          Rede de relacionamentos
        </div>
      </div>

      <!-- Quote -->
      <div class="pm-quote">
        "Se o produto é gratuito, <strong>você</strong> é o produto."
      </div>
    </div>

    <div class="pm-footer">
      <button id="close-privacy-modal">Entendi, vou ter mais cuidado</button>
    </div>
  </div>
</div>

<script>
  // O modal é controlado pelo app.js (sequência: toast → scanner → modal)
  // Aqui apenas registamos os listeners de fecho
  document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('privacy-modal');
    var btn   = document.getElementById('close-privacy-modal');
    if (btn) btn.addEventListener('click', function () { modal.classList.remove('visible'); });
    if (modal) modal.addEventListener('click', function (e) { if (e.target === modal || e.target.classList.contains('pm-backdrop')) modal.classList.remove('visible'); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') modal && modal.classList.remove('visible'); });
  });
</script>
