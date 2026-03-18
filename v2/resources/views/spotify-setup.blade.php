<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Spotify Setup</title>
    <style>
        body { font-family: monospace; background: #0d1117; color: #e6edf3; padding: 40px; }
        h2 { color: #1ed760; }
        .box { background: #161b22; border: 1px solid #30363d; border-radius: 8px; padding: 20px; margin: 20px 0; }
        code { background: #0d1117; padding: 12px 16px; border-radius: 6px; display: block; word-break: break-all; color: #1ed760; font-size: 13px; }
        p { color: #8b949e; line-height: 1.6; }
        .step { margin: 12px 0; }
    </style>
</head>
<body>
    <h2>✅ Spotify conectado com sucesso!</h2>
    <div class="box">
        <p>Copia o <strong>Refresh Token</strong> abaixo e adiciona ao ficheiro <code>.env</code> do servidor:</p>
        <code>SPOTIFY_REFRESH_TOKEN={{ $refresh_token }}</code>
    </div>
    <div class="box">
        <p><strong>Passos finais no servidor:</strong></p>
        <div class="step">1. Abre o ficheiro <code>.env</code></div>
        <div class="step">2. Adiciona a linha acima</div>
        <div class="step">3. Executa: <code>php artisan config:clear && php artisan cache:clear</code></div>
        <div class="step">4. O widget vai aparecer automaticamente quando estiveres a ouvir música no Spotify</div>
    </div>
</body>
</html>
