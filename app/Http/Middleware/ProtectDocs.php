<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtectDocs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = "admin";
        $password = "secret";

        $hasAuth = isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$hasAuth || $_SERVER['PHP_AUTH_USER'] !== $username || $_SERVER['PHP_AUTH_PW'] !== $password) {
            header('WWW-Authenticate: Basic realm="API Documentation"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Access to API Docs requires a login.";
            exit;
        }

        return $next($request);
    }
}
