<style>
    :root {
      --primary-bg: #263132;
      --primary-text: #ffffff;
      --accent-color: #00B8D4;
      --card-bg: #30302d;
      --modal-bg: #30302d;
      --button-hover: #008fa6;
      --transition-speed: 0.6s;
    }
  
    .privacy-modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 10001;
      backdrop-filter: blur(5px);
      opacity: 0;
      visibility: hidden;
      transition: opacity var(--transition-speed) ease, visibility var(--transition-speed) ease;
    }
    
    .privacy-modal.visible {
      opacity: 1;
      visibility: visible;
    }
  
    .modal-bg-layer {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(9, 14, 26, 0.75);
      backdrop-filter: blur(4px);
    }
  
    .modal-inner {
      position: relative;
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
      background-color: hsl(0, 0%, 9%);
      border-radius: 8px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
      overflow: hidden;
      color: var(--primary-text);
      font-family: 'Inter', 'Roboto', -apple-system, sans-serif;
    }
  
    .modal-header {
      position: relative;
      padding: 16px;
      display: flex;
      justify-content: flex-end;
    }
  
    .close-btn {
      background: none;
      border: none;
      color: white;
      font-size: 24px;
      cursor: pointer;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      transition: background-color var(--transition-speed) ease;
    }
  
    .close-btn:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }
  
    .modal-message {
      padding: 0 20px 20px;
    }
  
    .modal-message h3 {
      font-size: 20px;
      margin-top: 0;
      margin-bottom: 16px;
      font-weight: 600;
      text-align: center;
      color: #f3fdff;
    }
  
    .imagine-text {
      font-size: 16px;
      text-align: center;
      margin-bottom: 12px;
    }
  
    .company-logos {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 16px 0;
      flex-wrap: wrap;
    }
  
    .conhece-text {
      font-size: 18px;
      text-align: center;
      font-weight: 600;
      margin-bottom: 20px;
    }
  
    .data-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
      margin-bottom: 20px;
    }
  
    .data-card {
      background-color: rgba(30, 41, 59, 0.7);
      padding: 10px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
    }
  
    .card-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(0, 184, 212, 0.1);
      border-radius: 50%;
      width: 32px;
      height: 32px;
      flex-shrink: 0;
    }
  
    .impact-quote {
      background-color: rgba(0, 184, 212, 0.1);
      border-radius: 6px;
      padding: 16px;
      margin-bottom: 20px;
    }
  
    .quote-text {
      font-size: 16px;
      font-weight: 500;
      text-align: center;
      font-style: italic;
    }
  
    .quote-text span {
      color: #00B8D4;
      font-weight: 700;
    }
  
    .modal-footer {
      padding: 16px;
      display: flex;
      justify-content: center;
    }
  
    #close-privacy-modal {
      background-color: #00B8D4;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 30px;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 2px 5px rgba(0, 184, 212, 0.3);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
  
    #close-privacy-modal:hover {
      background-color: #0095a8;
      transform: translateY(-1px);
      box-shadow: 0 3px 7px rgba(0, 184, 212, 0.4);
    }
    
    #close-privacy-modal:active {
      transform: translateY(1px);
      box-shadow: 0 1px 3px rgba(0, 184, 212, 0.3);
    }
  
    @media (max-width: 500px) {
      .data-grid {
        grid-template-columns: 1fr;
      }
      
      .company-logos {
        gap: 15px;
      }
      
      .modal-message h3 {
        font-size: 18px;
      }
      
      .conhece-text {
        font-size: 16px;
      }
      
      .quote-text {
        font-size: 15px;
      }
      
      #close-privacy-modal {
        padding: 10px 18px;
        font-size: 14px;
      }
    }
  </style>
  
  <div id="privacy-modal" class=" privacy-modal">
    <div class="modal-bg-layer"></div>
    <div class="modal-inner">
      <div class="modal-header">
        {{-- <button class="close-btn" id="modal-close-btn" aria-label="Fechar">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6L6 18M6 6L18 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button> --}}
      </div>
      
      <div class="modal-message">
        <h3>Se um simples website pode obter tantas informações...</h3>
        
        <p class="imagine-text">Imagine o que</p>
        
        <div class="company-logos">
          <div class="logo-item google">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="24" viewBox="0 0 272 92"><path fill="#EA4335" d="M115.75 47.18c0 12.77-9.99 22.18-22.25 22.18s-22.25-9.41-22.25-22.18C71.25 34.32 81.24 25 93.5 25s22.25 9.32 22.25 22.18zm-9.74 0c0-7.98-5.79-13.44-12.51-13.44S80.99 39.2 80.99 47.18c0 7.9 5.79 13.44 12.51 13.44s12.51-5.55 12.51-13.44z"/><path fill="#FBBC05" d="M163.75 47.18c0 12.77-9.99 22.18-22.25 22.18s-22.25-9.41-22.25-22.18c0-12.85 9.99-22.18 22.25-22.18s22.25 9.32 22.25 22.18zm-9.74 0c0-7.98-5.79-13.44-12.51-13.44s-12.51 5.46-12.51 13.44c0 7.9 5.79 13.44 12.51 13.44s12.51-5.55 12.51-13.44z"/><path fill="#4285F4" d="M209.75 26.34v39.82c0 16.38-9.66 23.07-21.08 23.07-10.75 0-17.22-7.19-19.66-13.07l8.48-3.53c1.51 3.61 5.21 7.87 11.17 7.87 7.31 0 11.84-4.51 11.84-13v-3.19h-.34c-2.18 2.69-6.38 5.04-11.68 5.04-11.09 0-21.25-9.66-21.25-22.09 0-12.52 10.16-22.26 21.25-22.26 5.29 0 9.49 2.35 11.68 4.96h.34v-3.61h9.25zm-8.56 20.92c0-7.81-5.21-13.52-11.84-13.52-6.72 0-12.35 5.71-12.35 13.52 0 7.73 5.63 13.36 12.35 13.36 6.63 0 11.84-5.63 11.84-13.36z"/><path fill="#34A853" d="M225 3v65h-9.5V3h9.5z"/><path fill="#EA4335" d="M262.02 54.48l7.56 5.04c-2.44 3.61-8.32 9.83-18.48 9.83-12.6 0-22.01-9.74-22.01-22.18 0-13.19 9.49-22.18 20.92-22.18 11.51 0 17.14 9.16 18.98 14.11l1.01 2.52-29.65 12.28c2.27 4.45 5.8 6.72 10.75 6.72 4.96 0 8.4-2.44 10.92-6.14zm-23.27-7.98l19.82-8.23c-1.09-2.77-4.37-4.7-8.23-4.7-4.95 0-11.84 4.37-11.59 12.93z"/><path fill="#4285F4" d="M35.29 41.41V32H67c.31 1.64.47 3.58.47 5.68 0 7.06-1.93 15.79-8.15 22.01-6.05 6.3-13.78 9.66-24.02 9.66C16.32 69.35.36 53.89.36 34.91.36 15.93 16.32.47 35.3.47c10.5 0 17.98 4.12 23.6 9.49l-6.64 6.64c-4.03-3.78-9.49-6.72-16.97-6.72-13.86 0-24.7 11.17-24.7 25.03 0 13.86 10.84 25.03 24.7 25.03 8.99 0 14.11-3.61 17.39-6.89 2.66-2.66 4.41-6.46 5.1-11.65l-22.49.01z"/></svg>
          </div>
          <div class="logo-item facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </div>
          <div class="logo-item instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><linearGradient id="instagramGradient" x1="0%" y1="100%" x2="100%" y2="0%"><stop offset="0%" stop-color="#FFDC80"/><stop offset="8.333%" stop-color="#FCAF45"/><stop offset="16.667%" stop-color="#F77737"/><stop offset="25%" stop-color="#F56040"/><stop offset="33.333%" stop-color="#FD1D1D"/><stop offset="41.667%" stop-color="#E1306C"/><stop offset="50%" stop-color="#C13584"/><stop offset="58.333%" stop-color="#833AB4"/><stop offset="66.667%" stop-color="#5851DB"/><stop offset="75%" stop-color="#405DE6"/><stop offset="100%" stop-color="#0D1462"/></linearGradient><path fill="url(#instagramGradient)" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
          </div>
          <div class="logo-item whatsapp">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#25D366" d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
          </div>
        </div>
        
        <p class="conhece-text">sabem sobre você.</p>
        
        <div class="data-grid">
          <div class="data-card">
            <div class="card-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12.75C13.6569 12.75 15 11.4069 15 9.75C15 8.09315 13.6569 6.75 12 6.75C10.3431 6.75 9 8.09315 9 9.75C9 11.4069 10.3431 12.75 12 12.75Z" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.5 9.75C19.5 16.5 12 21.75 12 21.75C12 21.75 4.5 16.5 4.5 9.75C4.5 7.76088 5.29018 5.85322 6.6967 4.4467C8.10322 3.04018 10.0109 2.25 12 2.25C13.9891 2.25 15.8968 3.04018 17.3033 4.4467C18.7098 5.85322 19.5 7.76088 19.5 9.75Z" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <span>Sua localização em tempo real</span>
          </div>
          <div class="data-card">
            <div class="card-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 5L6 9H2V15H6L11 19V5Z" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.54 8.46C16.4774 9.39755 17.004 10.6692 17.004 11.995C17.004 13.3208 16.4774 14.5925 15.54 15.53" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.07 5.93C20.9447 7.80528 21.9979 10.3478 21.9979 13C21.9979 15.6522 20.9447 18.1947 19.07 20.07" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <span>Conversas próximas ao seu telefone</span>
          </div>
          <div class="data-card">
            <div class="card-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 22L3 16V10H21V16L15 22H9Z" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 10V2H13V10M11 14H13" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <span>Seus hábitos de compra</span>
          </div>
          <div class="data-card">
            <div class="card-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 14C20.49 12.54 22 10.79 22 8.5C22 7.04131 21.4205 5.64236 20.3891 4.61091C19.3576 3.57946 17.9587 3 16.5 3C14.74 3 13.5 3.5 12 5C10.5 3.5 9.26 3 7.5 3C6.04131 3 4.64236 3.57946 3.61091 4.61091C2.57946 5.64236 2 7.04131 2 8.5C2 10.8 3.5 12.55 5 14L12 21L19 14Z" stroke="#00B8D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <span>Seus relacionamentos</span>
          </div>
        </div>
        
        <div class="impact-quote">
          <div class="quote-text">
            "Se o produto é gratuito, <span>você</span> é o produto."
          </div>
        </div>
      </div>
      
      <div class="modal-footer">
        <button id="close-privacy-modal">Entendi, vou ter mais cuidado</button>
      </div>
    </div>
  </div>
  
  <script>
    // Exibir o modal quando a página carregar
    // document.addEventListener('DOMContentLoaded', function() {
        
    //   const modal = document.getElementById('privacy-modal');
    //   setTimeout(function() {
    //     modal.classList.add('visible');
    //   }, 1000);
    // });
  
    Fechar modal com o botão X
    document.getElementById('modal-close-btn').addEventListener('click', function() {
      const modal = document.getElementById('privacy-modal');
      modal.classList.remove('visible');
    });
    
    Fechar modal com o botão de entendimento
    document.getElementById('close-privacy-modal').addEventListener('click', function() {
      const modal = document.getElementById('privacy-modal');
      modal.classList.remove('visible');
    });
  </script>