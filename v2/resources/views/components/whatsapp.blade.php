<style>
  /* WhatsApp — círculo alinhado ao lado do tracker */
  .wa-float {
    position: fixed;
    bottom: 30px;
    right: 78px; /* 30 (tracker margin) + 38 (tracker width) + 10 (gap) */
    z-index: 9998;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #25D366;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 16px rgba(37,211,102,0.4);
    cursor: pointer;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    animation: wa-pulse 2.8s ease-in-out infinite;
  }
  @keyframes wa-pulse {
    0%, 100% { box-shadow: 0 4px 16px rgba(37,211,102,0.4), 0 0 0 0 rgba(37,211,102,0.3); }
    50%       { box-shadow: 0 4px 16px rgba(37,211,102,0.4), 0 0 0 7px rgba(37,211,102,0); }
  }
  .wa-float:hover { transform: scale(1.1); box-shadow: 0 6px 24px rgba(37,211,102,0.6); animation: none; }

  /* Tooltip */
  .wa-float::after {
    content: 'WhatsApp';
    position: absolute;
    bottom: 44px;
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
  .wa-float:hover::after { opacity: 1; }

  @media (max-width: 1024px) { .wa-float { display: none; } }
</style>

<a href="https://wa.me/258846474687?text=Ol%C3%A1%20Arnaldo%2C%20vim%20do%20seu%20portf%C3%B3lio%20e%20gostaria%20de%20falar%20consigo."
   target="_blank" rel="noopener noreferrer" class="wa-float" title="WhatsApp">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
  </svg>
</a>
