<style>
  .sp-widget {
    position: fixed;
    bottom: 82px;
    right: 30px;
    z-index: 9997;
    width: 268px;
    /* Liquid glass */
    background: linear-gradient(135deg, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0.03) 100%);
    backdrop-filter: blur(28px) saturate(180%) brightness(1.1);
    -webkit-backdrop-filter: blur(28px) saturate(180%) brightness(1.1);
    border-radius: 16px;
    padding: 11px 13px;
    align-items: center;
    gap: 11px;
    box-shadow:
      0 8px 32px rgba(0,0,0,0.45),
      inset 0 1px 0 rgba(255,255,255,0.14),
      inset 0 -1px 0 rgba(255,255,255,0.04),
      0 0 0 1px rgba(30,215,96,0.18);
    opacity: 0;
    visibility: hidden;
    transform: translateY(8px);
    transition:
      opacity 0.35s ease,
      visibility 0.35s ease,
      transform 0.35s ease,
      bottom 0.48s cubic-bezier(0.34, 1.56, 0.64, 1),
      right 0.48s cubic-bezier(0.34, 1.56, 0.64, 1),
      width 0.4s cubic-bezier(0.4, 0, 0.2, 1),
      border-radius 0.4s ease,
      padding 0.4s ease;
    display: flex;
    overflow: hidden;
  }
  /* Gradient border via pseudo-element */
  .sp-widget::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 16px;
    padding: 1px;
    background: linear-gradient(135deg, rgba(30,215,96,0.55) 0%, rgba(120,180,255,0.25) 50%, rgba(30,215,96,0.15) 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: destination-out;
    mask-composite: exclude;
    pointer-events: none;
    animation: sp-shimmer 4s linear infinite;
  }
  @keyframes sp-shimmer {
    0%   { background-position: 0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }
  .sp-widget.sp-on {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateY(0) !important;
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

  /* ── Docked: pill compacta na linha dos botões quando o modal abre ── */
  .sp-widget.sp-docked {
    bottom: 30px !important;
    right: 174px !important; /* 126 (ap-right) + 38 (ap-width) + 10 (gap) */
    width: 162px !important;
    height: 38px !important;
    border-radius: 19px !important;
    padding: 0 10px !important;
    gap: 8px !important;
    overflow: hidden !important;
    align-items: center !important;
    transform: translateY(0) !important;
  }
  .sp-widget.sp-docked::before { border-radius: 19px; }
  .sp-widget.sp-docked .sp-cover,
  .sp-widget.sp-docked .sp-cover-ph {
    width: 24px !important; height: 24px !important;
    border-radius: 5px !important;
  }
  .sp-widget.sp-docked .sp-cover-ph svg { width: 13px !important; height: 13px !important; }
  .sp-widget.sp-docked .sp-label,
  .sp-widget.sp-docked .sp-artist,
  .sp-widget.sp-docked .sp-prog,
  .sp-widget.sp-docked .sp-ext { display: none !important; }
  .sp-widget.sp-docked .sp-title { font-size: 10px !important; line-height: 1.2 !important; }

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

<script src="/js/spotify-widget.js?v=<?= filemtime(public_path('js/spotify-widget.js')) ?>"></script>
