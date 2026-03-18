<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nova mensagem de {{ $contact->name }}</title>
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  body{background:#0d1117;font-family:'Segoe UI',Arial,sans-serif;color:#e6edf3}
  .wrapper{max-width:600px;margin:0 auto;padding:32px 16px}
  .card{background:#161b22;border:1px solid #30363d;border-radius:12px;overflow:hidden}
  .header{background:#0d1117;padding:40px 36px 32px;border-bottom:1px solid #30363d;position:relative}
  .accent{height:3px;background:#00b8d4;position:absolute;top:0;left:0;right:0}
  .logo-wrap{display:flex;align-items:center;gap:12px;margin-bottom:24px}
  .logo-icon{width:40px;height:40px;border-radius:10px;background:rgba(0,184,212,0.12);border:1px solid rgba(0,184,212,0.25);display:inline-flex;align-items:center;justify-content:center;flex-shrink:0}
  .logo-name{font-size:15px;font-weight:700;color:#e6edf3}
  .logo-sub{font-size:11px;color:#8b949e;margin-top:2px}
  .badge{display:inline-flex;align-items:center;gap:6px;background:rgba(0,184,212,0.1);border:1px solid rgba(0,184,212,0.25);border-radius:20px;padding:4px 12px;font-size:11px;font-weight:600;color:#00b8d4;letter-spacing:0.06em;text-transform:uppercase;margin-bottom:14px}
  .badge-dot{width:6px;height:6px;border-radius:50%;background:#00b8d4;display:inline-block}
  h1{font-size:20px;font-weight:700;color:#e6edf3;line-height:1.45}
  .body{padding:32px 36px}
  .meta-grid{display:table;width:100%;border-collapse:separate;border-spacing:0 0;margin-bottom:28px}
  .meta-row{display:table-row}
  .meta-cell{display:table-cell;padding:10px 14px;font-size:13px;border-bottom:1px solid #21262d}
  .meta-label{color:#8b949e;font-size:11px;text-transform:uppercase;letter-spacing:0.07em;font-weight:600;width:100px}
  .meta-value{color:#e6edf3}
  .meta-value a{color:#00b8d4;text-decoration:none}
  .msg-label{font-size:11px;text-transform:uppercase;letter-spacing:0.07em;color:#8b949e;font-weight:600;margin-bottom:10px}
  .msg-box{background:#0d1117;border:1px solid #30363d;border-left:3px solid #00b8d4;border-radius:0 8px 8px 0;padding:18px 20px;font-size:14px;line-height:1.8;color:#c9d1d9;white-space:pre-wrap;word-break:break-word}
  .actions{margin-top:28px;text-align:center}
  .btn{display:inline-block;background:#00b8d4;color:#0d1117 !important;text-decoration:none;font-size:13px;font-weight:700;padding:13px 32px;border-radius:8px;letter-spacing:0.04em}
  .footer{padding:20px 36px 28px;border-top:1px solid #21262d;text-align:center}
  .footer p{font-size:11px;color:#484f58;line-height:1.7}
  .footer a{color:#8b949e;text-decoration:none}
</style>
</head>
<body>
<div class="wrapper">
  <div class="card">
    <div class="header">
      <div class="accent"></div>
      <div class="logo-wrap">
        <div class="logo-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00b8d4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L3 6V12C3 16.5 7 20.7 12 22C17 20.7 21 16.5 21 12V6L12 2Z"/><path d="M9 12L11 14L15 10"/></svg>
        </div>
        <div>
          <div class="logo-name">Arnaldo Tomo</div>
          <div class="logo-sub">contacto@arnaldotomo.dev · arnaldotomo.dev</div>
        </div>
      </div>
      <div class="badge"><span class="badge-dot"></span>&nbsp;Nova Mensagem</div>
      <h1>Recebeste uma nova mensagem do teu portfólio</h1>
    </div>

    <div class="body">
      <table style="width:100%;border-collapse:collapse;margin-bottom:28px;background:#0d1117;border:1px solid #30363d;border-radius:8px;overflow:hidden">
        <tr style="border-bottom:1px solid #21262d">
          <td style="padding:11px 16px;font-size:11px;text-transform:uppercase;letter-spacing:.07em;color:#8b949e;font-weight:600;width:90px">Nome</td>
          <td style="padding:11px 16px;font-size:14px;color:#e6edf3">{{ $contact->name }}</td>
        </tr>
        <tr style="border-bottom:1px solid #21262d">
          <td style="padding:11px 16px;font-size:11px;text-transform:uppercase;letter-spacing:.07em;color:#8b949e;font-weight:600">Email</td>
          <td style="padding:11px 16px;font-size:14px"><a href="mailto:{{ $contact->email }}" style="color:#00b8d4;text-decoration:none">{{ $contact->email }}</a></td>
        </tr>
        <tr style="border-bottom:1px solid #21262d">
          <td style="padding:11px 16px;font-size:11px;text-transform:uppercase;letter-spacing:.07em;color:#8b949e;font-weight:600">Data</td>
          <td style="padding:11px 16px;font-size:14px;color:#c9d1d9">{{ $contact->created_at->format('d/m/Y \à\s H:i') }}</td>
        </tr>
        <tr>
          <td style="padding:11px 16px;font-size:11px;text-transform:uppercase;letter-spacing:.07em;color:#8b949e;font-weight:600">IP</td>
          <td style="padding:11px 16px;font-size:14px;color:#8b949e">{{ $contact->ip ?? '—' }}</td>
        </tr>
      </table>

      <div style="font-size:11px;text-transform:uppercase;letter-spacing:.07em;color:#8b949e;font-weight:600;margin-bottom:10px">Mensagem</div>
      <div style="background:#0d1117;border:1px solid #30363d;border-left:3px solid #00b8d4;border-radius:0 8px 8px 0;padding:18px 20px;font-size:14px;line-height:1.8;color:#c9d1d9;white-space:pre-wrap;word-break:break-word">{{ $contact->message }}</div>

      <div style="margin-top:28px;text-align:center">
        <a href="mailto:{{ $contact->email }}?subject=Re%3A+A+sua+mensagem+no+portf%C3%B3lio" style="display:inline-block;background:#00b8d4;color:#0d1117;text-decoration:none;font-size:13px;font-weight:700;padding:13px 32px;border-radius:8px;letter-spacing:.04em">
          ↩ Responder a {{ $contact->name }}
        </a>
      </div>
    </div>

    <div style="padding:20px 36px 28px;border-top:1px solid #21262d;text-align:center">
      <p style="font-size:11px;color:#484f58;line-height:1.7">
        Mensagem recebida via <a href="https://arnaldotomo.dev" style="color:#8b949e;text-decoration:none">arnaldotomo.dev</a> &nbsp;·&nbsp; {{ now()->format('d/m/Y') }}
      </p>
    </div>
  </div>
</div>
</body>
</html>
