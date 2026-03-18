<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Override SMTP transport to disable SSL peer verification.
        // Needed for shared-hosting mail servers with self-signed / hostname-mismatched certs.
        Mail::extend('smtp', function (array $config) {
            $useSsl = isset($config['scheme']) && str_contains((string) $config['scheme'], 's');

            $stream = new SocketStream();
            $stream->setHost($config['host'] ?? '127.0.0.1');
            $stream->setPort((int) ($config['port'] ?? 587));
            if (!$useSsl) {
                $stream->disableTls();
            }
            $stream->setStreamOptions([
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ],
            ]);

            $transport = new EsmtpTransport(
                $config['host'] ?? '127.0.0.1',
                (int) ($config['port'] ?? 587),
                $useSsl,
                null,
                null,
                $stream
            );

            if (!empty($config['username'])) {
                $transport->setUsername($config['username']);
            }
            if (!empty($config['password'])) {
                $transport->setPassword($config['password']);
            }

            return $transport;
        });
    }
}
