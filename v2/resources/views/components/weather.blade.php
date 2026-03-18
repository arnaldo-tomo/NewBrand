<style>
  .wt-widget {
    position: fixed;
    bottom: 2.2rem;
    left: 50%;
    transform: translateX(-50%) translateY(6px);
    z-index: 9996;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 6px 14px;
    border-radius: 20px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(20px) saturate(160%);
    -webkit-backdrop-filter: blur(20px) saturate(160%);
    box-shadow: 0 4px 16px rgba(0,0,0,0.35), inset 0 1px 0 rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.15);
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.45s ease, transform 0.45s ease;
  }
  .wt-widget.wt-visible {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
    pointer-events: auto;
  }

  .wt-icon { font-size: 14px; line-height: 1; }
  .wt-temp { font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 600; color: #fff; }
  .wt-sep  { width: 1px; height: 11px; background: rgba(255,255,255,0.18); }
  .wt-city { font-family: 'Poppins', sans-serif; font-size: 9px; font-weight: 500; color: rgba(255,255,255,0.45); letter-spacing: 0.05em; }

  @media (max-width: 768px) { .wt-widget { display: none !important; } }
</style>

<div id="wt-widget" class="wt-widget">
  <span class="wt-icon" id="wt-icon">⛅</span>
  <span class="wt-temp" id="wt-temp">—°</span>
  <span class="wt-sep"></span>
  <span class="wt-city" id="wt-city">—</span>
</div>

<script src="/js/weather-widget.js?v=<?= filemtime(public_path('js/weather-widget.js')) ?>"></script>
