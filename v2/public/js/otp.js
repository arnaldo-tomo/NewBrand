document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input[name="pin[]"]');
    const form = document.querySelector('form');
    let isSubmitting = false;

    // Verificar se os elementos existem
    if (!inputs.length || !form) {
        console.error('Inputs ou formulário não encontrados no DOM');
        return;
    }

    // Adicionar spinner
    const spinnerHTML = `
        <div id="loading-spinner" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
            <div class="inline-block w-16 h-16 align-middle border-4 border-white border-solid rounded-full animate-spin border-r-transparent">
                <span class="hidden">Loading...</span>
            </div>
        </div>`;
    document.body.insertAdjacentHTML('beforeend', spinnerHTML);
    const spinner = document.getElementById('loading-spinner');

    function showSpinner() {
        spinner.style.display = 'flex';
    }

    function hideSpinner() {
        spinner.style.display = 'none';
    }

    function submitForm() {
        if (isSubmitting) return;

        const allFilled = Array.from(inputs).every(input => input.value.length === 1);
        if (allFilled) {
            console.log('Todos os campos preenchidos, enviando formulário...');
            isSubmitting = true;
            showSpinner();
            form.submit();
        } else {
            console.log('Nem todos os campos estão preenchidos');
        }
    }

    function startTimer(duration, display) {
        let timer = duration, minutes, seconds;
        const interval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = `${minutes}:${seconds}`;

            if (--timer < 0) {
                clearInterval(interval);
                display.textContent = "Expirado";
                inputs.forEach(input => input.disabled = true);
                console.log('Timer expirou');
            }
        }, 1000);
    }

    const timerDisplay = document.querySelector('#timer');
    if (timerDisplay) {
        startTimer(600, timerDisplay);
    } else {
        console.error('Elemento #timer não encontrado');
    }

    inputs.forEach((input, index) => {
        input.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
            console.log(`Input ${index}: ${this.value}`);
            if (this.value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
            if (index === inputs.length - 1 && this.value) {
                setTimeout(submitForm, 100);
            }
        });

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !this.value && index > 0) {
                inputs[index - 1].focus();
                console.log(`Backspace: Foco movido para input ${index - 1}`);
            }
        });

        input.addEventListener('paste', function(e) {
            e.preventDefault();
            const paste = e.clipboardData.getData('text');
            const numbers = paste.match(/\d/g);
            console.log(`Colagem detectada: ${paste}`);

            if (numbers && numbers.length > 0) {
                inputs.forEach((input, i) => {
                    if (numbers[i] && i < inputs.length) {
                        input.value = numbers[i];
                    }
                });
                const nextEmpty = Array.from(inputs).findIndex(input => !input.value);
                if (nextEmpty >= 0) {
                    inputs[nextEmpty].focus();
                } else {
                    inputs[inputs.length - 1].focus();
                    setTimeout(submitForm, 100);
                }
            }
        });
    });

    form.addEventListener('submit', function(e) {
        if (isSubmitting) {
            e.preventDefault();
            console.log('Envio bloqueado: já em andamento');
        } else {
            console.log('Formulário submetido');
            isSubmitting = true;
            showSpinner();
        }
    });
});