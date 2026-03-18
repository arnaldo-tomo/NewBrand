<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recebi a sua mensagem — Arnaldo Tomo</title>
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  body{background:#0d1117;font-family:'Segoe UI',Arial,sans-serif;color:#e6edf3}
  .wrapper{max-width:600px;margin:0 auto;padding:32px 16px}
  .card{background:#161b22;border:1px solid #30363d;border-radius:12px;overflow:hidden}
</style>
</head>
<body>
<div class="wrapper">
  <div class="card">

    {{-- Top accent --}}
    <div style="height:3px;background:linear-gradient(90deg,#00b8d4,#0070f3)"></div>

    {{-- Header --}}
    <div style="padding:40px 36px 32px;background:#0d1117;border-bottom:1px solid #21262d">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:32px">
        <div style="width:44px;height:44px;border-radius:11px;background:rgba(0,184,212,0.12);border:1px solid rgba(0,184,212,0.25);display:inline-flex;align-items:center;justify-content:center;flex-shrink:0">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#00b8d4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L3 6V12C3 16.5 7 20.7 12 22C17 20.7 21 16.5 21 12V6L12 2Z"/><path d="M9 12L11 14L15 10"/></svg>
        </div>
        <div>
          <div style="font-size:16px;font-weight:700;color:#e6edf3">Arnaldo Tomo</div>
          <div style="font-size:11px;color:#8b949e;margin-top:2px">Software Engineer · Full Stack Developer</div>
        </div>
      </div>

      {{-- Success icon --}}
      <div style="text-align:center;margin-bottom:24px">
        <div style="width:64px;height:64px;border-radius:50%;background:rgba(74,222,128,0.1);border:1px solid rgba(74,222,128,0.3);display:inline-flex;align-items:center;justify-content:center">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
      </div>

      <h1 style="font-size:22px;font-weight:700;color:#e6edf3;text-align:center;line-height:1.4;margin-bottom:10px">
        Mensagem recebida com sucesso!
      </h1>
      <p style="font-size:14px;color:#8b949e;text-align:center;line-height:1.6">
        Olá <strong style="color:#e6edf3">{{ $contact->name }}</strong>, obrigado por entrar em contacto.
      </p>
    </div>

    {{-- Body --}}
    <div style="padding:32px 36px">

      <p style="font-size:14px;color:#c9d1d9;line-height:1.8;margin-bottom:24px">
        Recebi a sua mensagem e farei o possível para responder o mais breve possível — normalmente dentro de <strong style="color:#e6edf3">24 a 48 horas</strong>.
      </p>

      {{-- Message preview --}}
      <div style="background:#0d1117;border:1px solid #30363d;border-left:3px solid #00b8d4;border-radius:0 8px 8px 0;padding:16px 20px;margin-bottom:28px">
        <div style="font-size:10px;text-transform:uppercase;letter-spacing:.08em;color:#8b949e;font-weight:600;margin-bottom:8px">A sua mensagem</div>
        <p style="font-size:13px;color:#8b949e;line-height:1.7;white-space:pre-wrap;word-break:break-word">{{ \Illuminate\Support\Str::limit($contact->message, 280) }}</p>
      </div>

      {{-- Social links --}}
      <div style="background:#0d1117;border:1px solid #30363d;border-radius:8px;padding:20px 24px;margin-bottom:28px">
        <div style="font-size:11px;text-transform:uppercase;letter-spacing:.08em;color:#8b949e;font-weight:600;margin-bottom:14px">Enquanto isso, conecte-se comigo</div>
        <table style="width:100%;border-collapse:collapse">
          <tr>
            <td style="padding:6px 0">
              <a href="https://linkedin.com/in/arnaldo-tomo" style="color:#00b8d4;text-decoration:none;font-size:13px">
                <svg style="width:14px;height:14px;vertical-align:middle;margin-right:8px" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                linkedin.com/in/arnaldo-tomo
              </a>
            </td>
          </tr>
          <tr>
            <td style="padding:6px 0">
              <a href="https://github.com/arnaldo-tomo" style="color:#8b949e;text-decoration:none;font-size:13px">
                <svg style="width:14px;height:14px;vertical-align:middle;margin-right:8px" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                github.com/arnaldo-tomo
              </a>
            </td>
          </tr>
          <tr>
            <td style="padding:6px 0">
              <a href="https://arnaldotomo.dev" style="color:#8b949e;text-decoration:none;font-size:13px">
                <svg style="width:14px;height:14px;vertical-align:middle;margin-right:8px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
                arnaldotomo.dev
              </a>
            </td>
          </tr>
        </table>
      </div>

      <div style="text-align:center">
        <a href="https://arnaldotomo.dev" style="display:inline-block;background:rgba(0,184,212,0.12);border:1px solid rgba(0,184,212,0.3);color:#00b8d4;text-decoration:none;font-size:13px;font-weight:600;padding:11px 28px;border-radius:8px;letter-spacing:.03em">
          Ver Portfólio →
        </a>
      </div>
    </div>

    {{-- Footer --}}
    <div style="padding:18px 36px 24px;border-top:1px solid #21262d;text-align:center">
      <p style="font-size:12px;color:#8b949e;margin-bottom:4px">
        <strong style="color:#e6edf3">Arnaldo Tomo</strong> &nbsp;·&nbsp; Software Engineer
      </p>
      <p style="font-size:11px;color:#484f58;line-height:1.7">
        <a href="mailto:contacto@arnaldotomo.dev" style="color:#484f58;text-decoration:none">contacto@arnaldotomo.dev</a>
        &nbsp;·&nbsp; Maputo, Moçambique
      </p>
      <p style="font-size:10px;color:#333;margin-top:10px">
        Este é um email automático — por favor não responda directamente a este email.
      </p>
    </div>

  </div>
</div>
</body>
</html>
