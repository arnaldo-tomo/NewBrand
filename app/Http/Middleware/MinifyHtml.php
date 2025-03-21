<?php

namespace App\Http\Middleware;

use Closure;

class MinifyHtml
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $output = preg_replace('/\s+/', ' ', $response->getContent());
        $response->setContent($output);
        return $response;
    }
}