{{-- <x-guest-layout> --}}

    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
{{-- </x-guest-layout> --}}


<x-guest-layout>
  <div class="bg-black min-h-screen p-4 font-mono text-green-500 flex items-center justify-center">
      <div class="w-full max-w-2xl">
          <!-- Cabeçalho do Terminal -->
          <div class="terminal-header flex items-center justify-between p-2 bg-gray-900 border-b border-green-700">
              <div class="flex space-x-2">
                  <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                  <div class="w-3 h-3 bg-green-500 rounded-full"></div>
              </div>
              <div class="text-xs text-gray-500">root@system:~</div>
              <div></div>
          </div>

          <!-- Corpo do Terminal -->
          <div id="terminal-body" class="bg-black p-4 h-96 overflow-y-auto border border-green-700 border-t-0">
              <!-- Saída inicial do terminal -->
              <div id="terminal-output">
                  <pre class="text-green-400 mb-4">
_______ _______  ______ _______ _____ __   _ _______  _____
  |    |______ |_____/ |  |  |   |   | \  | |_____|    |   |
  |    |______ |    \_ |  |  | __|__ |  \_| |     |    |   |_____

_     _ _______ _______ _     _ _______  ______
|_____| |_____| |       |____/  |______ |_____/
|     | |     | |_____  |    \_ |______ |    \_

</pre>
                  <p class="text-green-400 mb-1">Sistema Operacional V.4.2.0-laravel (build #7128)</p>
                  <p class="text-green-400 mb-1">Copyright (c) 2025 OpSec Security Systems</p>
                  <p class="text-green-400 mb-4">Todos os direitos reservados.</p>

                  <p class="text-yellow-400 mb-2">AVISO: O acesso não autorizado é estritamente proibido.</p>
                  <p class="text-yellow-400 mb-4">Os invasores serão rastreados e processados.</p>

                  <p class="mb-2">Última tentativa de acesso: {{ now()->subHours(rand(1, 24))->format('D M d H:i:s') }}</p>
                  <p class="mb-2">{{ rand(1, 10) }} tentativas de acesso malsucedidas desde o último login</p>
                  <p class="text-green-400 mb-2">Sistema aguardando autenticação...</p>

                  <p class="text-green-400 mb-4">Digite '<span class="text-yellow-400">login --help</span>' para instruções</p>
              </div>

              <!-- Área de entrada de comandos -->
              <div id="command-area" class="mt-4">
                  <div class="terminal-input-line flex">
                      <span class="text-green-500 mr-2">root@system:~$</span>
                      <input type="text" id="terminal-input" class="bg-transparent border-none outline-none text-green-400 flex-grow cursor-text w-full" autofocus>
                  </div>
              </div>
          </div>

          <!-- Formulário oculto para processar o login -->
          <form id="login-form" method="POST" action="{{ route('login') }}" class="hidden">
              @csrf
              <input type="hidden" id="email-field" name="email">
              <input type="hidden" id="password-field" name="password">
              <input type="hidden" id="remember-field" name="remember" value="0">
          </form>
      </div>
  </div>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const terminalInput = document.getElementById('terminal-input');
          const terminalOutput = document.getElementById('terminal-output');
          const commandArea = document.getElementById('command-area');
          const loginForm = document.getElementById('login-form');
          const emailField = document.getElementById('email-field');
          const passwordField = document.getElementById('password-field');
          const rememberField = document.getElementById('remember-field');
          const terminalBody = document.getElementById('terminal-body');

          let username = '';
          let password = '';
          let loginAttempts = 0;
          let commandHistory = [];
          let historyIndex = -1;

          // Estrutura de estado do terminal
          const terminalState = {
              authenticated: false,
              awaitingPassword: false,
              username: null
          };

          // Foca o terminal input quando a página carrega
          terminalInput.focus();

          // Processamento de comandos do terminal
          terminalInput.addEventListener('keydown', function(e) {
              // Navegação no histórico de comandos
              if (e.key === 'ArrowUp') {
                  e.preventDefault();
                  navigateHistory('up');
              } else if (e.key === 'ArrowDown') {
                  e.preventDefault();
                  navigateHistory('down');
              }

              if (e.key === 'Enter') {
                  const command = this.value.trim();
                  if (command) {
                      commandHistory.push(command);
                      historyIndex = commandHistory.length;
                  }

                  // Adiciona o comando à saída
                  terminalOutput.innerHTML += `<div class="mt-2"><span class="text-green-500">root@system:~$</span> ${command}</div>`;

                  // Processa o comando
                  processCommand(command);

                  // Limpa a entrada
                  this.value = '';

                  // Rola para o fundo
                  terminalBody.scrollTop = terminalBody.scrollHeight;
              }
          });

          // Navegação no histórico de comandos
          function navigateHistory(direction) {
              if (commandHistory.length === 0) return;

              if (direction === 'up') {
                  historyIndex = Math.max(0, historyIndex - 1);
              } else {
                  historyIndex = Math.min(commandHistory.length, historyIndex + 1);
              }

              if (historyIndex === commandHistory.length) {
                  terminalInput.value = '';
              } else {
                  terminalInput.value = commandHistory[historyIndex];
              }
          }

          // Função para processar comandos
          function processCommand(cmd) {
              // Remover espaços extras e quebrar comando em partes
              const args = cmd.split(' ').filter(arg => arg !== '');
              const command = args[0]?.toLowerCase();

              // Se estiver aguardando senha
              if (terminalState.awaitingPassword) {
                  // Tratar input como senha
                  password = cmd;
                  terminalState.awaitingPassword = false;

                  // Mostrar asteriscos para esconder a senha
                  terminalOutput.lastElementChild.innerHTML =
                      `<span class="text-green-500">root@system:~$</span> ${'*'.repeat(cmd.length)}`;

                  // Tentar autenticar
                  attemptLogin(terminalState.username, password);
                  return;
              }

              // Processamento normal de comandos
              let response = '';

              switch(command) {
                  case 'login':
                      handleLoginCommand(args);
                      break;

                  case 'clear':
                  case 'cls':
                      terminalOutput.innerHTML = '';
                      return;

                  case 'help':
                      response = `
                      <p class="mt-1 text-yellow-400">Comandos disponíveis:</p>
                      <p class="ml-4 text-green-300">login --user &lt;nome_usuario&gt; - Inicia processo de login</p>
                      <p class="ml-4 text-green-300">login --help - Mostra ajuda do comando login</p>
                      <p class="ml-4 text-green-300">clear/cls - Limpa a tela do terminal</p>
                      <p class="ml-4 text-green-300">help - Mostra esta lista de comandos</p>
                      <p class="ml-4 text-green-300">date - Mostra a data atual</p>
                      <p class="ml-4 text-green-300">whoami - Mostra o usuário atual</p>
                      `;
                      break;

                  case 'date':
                      response = `<p class="mt-1">${new Date().toString()}</p>`;
                      break;

                  case 'whoami':
                      if (terminalState.authenticated) {
                          response = `<p class="mt-1">${terminalState.username}</p>`;
                      } else {
                          response = `<p class="mt-1 text-red-400">Erro: Nenhum usuário autenticado.</p>`;
                      }
                      break;

                  default:
                      if (cmd) {
                          response = `<p class="mt-1 text-red-400">Comando não reconhecido: ${command}</p>
                          <p class="text-yellow-400">Digite 'help' para ver a lista de comandos disponíveis.</p>`;
                      }
              }

              terminalOutput.innerHTML += response;
          }

          // Função para lidar com o comando login e suas variações
          function handleLoginCommand(args) {
              // Verificar argumentos do comando login
              if (args.length === 1) {
                  terminalOutput.innerHTML += `
                  <p class="mt-1 text-red-400">Erro: Argumentos insuficientes para 'login'.</p>
                  <p class="text-yellow-400">Use 'login --user &lt;nome_usuario&gt;' ou 'login --help' para ajuda.</p>
                  `;
                  return;
              }

              const option = args[1];

              if (option === '--help') {
                  terminalOutput.innerHTML += `
                  <p class="mt-1 text-yellow-400">Uso do comando login:</p>
                  <p class="ml-4 text-green-300">login --user &lt;nome_usuario&gt; - Inicia o processo de login</p>
                  <p class="ml-4 text-green-300">Após inserir o nome de usuário, será solicitada a senha</p>
                  `;
                  return;
              }

              if (option === '--user' && args.length >= 3) {
                  const username = args[2];
                  terminalState.username = username;
                  terminalState.awaitingPassword = true;

                  terminalOutput.innerHTML += `
                  <p class="mt-1 text-yellow-400">Usuário '${username}' reconhecido. Digite sua senha:</p>
                  `;
                  return;
              }

              terminalOutput.innerHTML += `
              <p class="mt-1 text-red-400">Erro: Opção inválida para 'login'.</p>
              <p class="text-yellow-400">Use 'login --user &lt;nome_usuario&gt;' ou 'login --help' para ajuda.</p>
              `;
          }

          // Função para tentar realizar o login
          function attemptLogin(username, password) {
              // Simulação de verificação
              terminalOutput.innerHTML += `
              <p class="mt-1 text-yellow-400">Tentando autenticar usuário '${username}'...</p>
              `;

              // Aqui você pode adaptar para usar o email real do usuário
              // Para este exemplo, assumimos que username é o email
              emailField.value = username;
              passwordField.value = password;

              // Simular processamento
              setTimeout(() => {
                  // Em um cenário real, você submeteria o formulário aqui
                  loginForm.submit();

                  // Esta parte só seria executada se houver erro no login
                  loginAttempts++;
                  if (loginAttempts >= 3) {
                      terminalOutput.innerHTML += `
                      <p class="mt-1 text-red-500">ALERTA: Múltiplas tentativas de login detectadas!</p>
                      <p class="text-red-400">O sistema está registrando sua atividade.</p>
                      `;
                  }
              }, 1500);
          }

          // Foca o terminal input quando clica em qualquer parte do terminal
          terminalBody.addEventListener('click', function() {
              terminalInput.focus();
          });

          // Exibir erros de autenticação, se houver
          @if ($errors->any())
              terminalOutput.innerHTML += `
              <p class="mt-1 text-red-500">Falha na autenticação. Acesso negado.</p>
              <p class="text-red-400">Tente novamente, dev.</p>
              `;
          @endif
      });
  </script>

  <style>
      @keyframes cursor-blink {
          0%, 100% { opacity: 1; }
          50% { opacity: 0; }
      }

      .terminal-input-line {
          position: relative;
      }

      .terminal-input-line::after {
          content: '';
          position: absolute;
          left: calc(100% + 2px);
          top: 50%;
          transform: translateY(-50%);
          width: 8px;
          height: 16px;
          background-color: #10B981;
          animation: cursor-blink 1s infinite;
      }

      /* Estilo para tornar o terminal mais realista */
      #terminal-body {
          text-shadow: 0 0 5px rgba(16, 185, 129, 0.7);
          box-shadow: 0 0 15px rgba(16, 185, 129, 0.5);
          background-image: radial-gradient(rgba(16, 185, 129, 0.05) 1px, transparent 1px);
          background-size: 4px 4px;
      }

      #terminal-body::before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background: repeating-linear-gradient(
              transparent,
              transparent 2px,
              rgba(16, 185, 129, 0.05) 3px,
              rgba(16, 185, 129, 0.05) 3px
          );
          pointer-events: none;
          opacity: 0.3;
      }
  </style>
</x-guest-layout>
