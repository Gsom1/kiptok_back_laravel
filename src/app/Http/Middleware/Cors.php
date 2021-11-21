<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Response;

/**
 * TODO it's dev version
 */
class Cors
{
    public function handle($request, Closure $next)
    {
        $allowed_domains = ['http://localhost:8080', 'http://kiptok.ru', 'https://kiptok.ru'];
        $domain = $_SERVER['HTTP_ORIGIN'] ?? '';

        $headers = [
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Allow-Methods'     => ['POST', 'GET', 'OPTIONS', 'PUT', 'DELETE'],
            'Access-Control-Allow-Headers'     => 'Content-Type, X-Auth-Token, Origin'
        ];
        if (in_array($domain, $allowed_domains, true)) {
            $headers['Access-Control-Allow-Origin'] = $domain;
        }

        if ($request->getMethod() === "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return new Response('OK', 200, $headers);
        }

        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }
        return $response;
    }
}
