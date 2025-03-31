document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.querySelector('.lang-dropdown');
    const dropdownBtn = document.querySelector('.lang-dropdown-btn');
    
    dropdownBtn.addEventListener('click', function(e) {
        e.preventDefault();
        dropdown.classList.toggle('active');
    });
    
    // Fechar dropdown ao clicar fora
    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });
});