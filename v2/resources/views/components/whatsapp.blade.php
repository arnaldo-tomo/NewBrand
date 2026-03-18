<style>
  .wa-float {
    position: fixed;
    bottom: 28px;
    left: 28px;
    z-index: 9999;
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    cursor: pointer;
  }

  .wa-bubble {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: #25D366;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 20px rgba(37,211,102,0.45);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    flex-shrink: 0;
    animation: wa-pulse 2.5s ease-in-out infinite;
  }

  @keyframes wa-pulse {
    0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.45), 0 0 0 0 rgba(37,211,102,0.35); }
    50%       { box-shadow: 0 4px 20px rgba(37,211,102,0.45), 0 0 0 10px rgba(37,211,102,0); }
  }

  .wa-float:hover .wa-bubble {
    transform: scale(1.1);
    box-shadow: 0 6px 28px rgba(37,211,102,0.6);
    animation: none;
  }

  .wa-label {
    background: rgba(10,15,28,0.85);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    padding: 6px 14px;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 500;
    color: rgba(255,255,255,0.8);
    white-space: nowrap;
    opacity: 0;
    transform: translateX(-6px);
    transition: opacity 0.25s ease, transform 0.25s ease;
    pointer-events: none;
  }

  .wa-float:hover .wa-label {
    opacity: 1;
    transform: translateX(0);
  }

  /* Esconder em mobile (conflito com navegação) */
  @media (max-width: 768px) { .wa-float { display: none; } }
</style>

<a href="https://wa.me/258846474687?text=Ol%C3%A1%20Arnaldo%2C%20vim%20do%20seu%20portf%C3%B3lio%20e%20gostaria%20de%20falar%20consigo."
   target="_blank" rel="noopener noreferrer" class="wa-float" title="Falar no WhatsApp">
  <div class="wa-bubble">
    <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
      <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
    </svg>
  </div>
  <span class="wa-label">Falar no WhatsApp</span>
</a>
