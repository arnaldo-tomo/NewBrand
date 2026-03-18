(function () {
    var INTERVAL = 6000;
    var sections = ['Home', 'About', 'Projects', 'Education', 'Testimonials', 'Blog', 'Packages', 'Contact'];
    var labels   = {
        Home: 'Início', About: 'Sobre', Projects: 'Projetos',
        Education: 'Educação', Testimonials: 'Depoimentos',
        Blog: 'Blog', Packages: 'Packages', Contact: 'Contacto'
    };
    var current = 0, timer = null, running = false;

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

        // Detectar secção actual via classe .active que o pagepiling gere
        current = 0;
        var active = document.querySelector('.vlt-section.active[data-anchor]');
        if (active) {
            var anchor = active.getAttribute('data-anchor');
            var idx = sections.indexOf(anchor);
            if (idx >= 0) current = idx;
        }

        goTo(current);
        document.addEventListener('keydown', onEsc);
    }

    function stopPresentation() {
        running = false;
        clearTimeout(timer);
        document.getElementById('ap-btn').classList.remove('ap-active');
        document.getElementById('ap-icon-play').style.display = 'block';
        document.getElementById('ap-icon-stop').style.display = 'none';
        document.getElementById('ap-progress-wrap').classList.remove('ap-visible');
        document.getElementById('ap-section-indicator').classList.remove('ap-visible');
        var bar = document.getElementById('ap-progress-bar');
        bar.style.transition = 'none';
        bar.style.width = '0%';
        document.removeEventListener('keydown', onEsc);
    }

    function goTo(idx) {
        if (!running) return;
        var anchor = sections[idx];
        if (!anchor) { stopPresentation(); return; }

        if (typeof $.fn.pagepiling !== 'undefined' && typeof $.fn.pagepiling.moveTo === 'function') {
            $.fn.pagepiling.moveTo(anchor);
        } else {
            // fallback: hash change que o pagepiling escuta
            window.location.hash = anchor;
        }

        document.getElementById('ap-section-indicator').textContent =
            (idx + 1) + ' / ' + sections.length + '  ·  ' + (labels[anchor] || anchor);

        var bar = document.getElementById('ap-progress-bar');
        bar.style.transition = 'none';
        bar.style.width = '0%';
        setTimeout(function () {
            bar.style.transition = 'width ' + INTERVAL + 'ms linear';
            bar.style.width = '100%';
        }, 30);

        timer = setTimeout(function () {
            current = (idx + 1) % sections.length;
            goTo(current);
        }, INTERVAL);
    }

    function onEsc(e) { if (e.key === 'Escape') stopPresentation(); }
})();
