<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockDetectionBots
{
    public function handle(Request $request, Closure $next)
    {
        $blockedAgents = ['Wappalyzer', 'BuiltWith', 'Netcraft', 'WhatRuns', 'Cloudflare Insights'];

        foreach ($blockedAgents as $agent) {
            if (stripos($request->userAgent(), $agent) !== false) {
                abort(403, 'Acesso negado.');
            }
        }

        return $next($request);
    }
}