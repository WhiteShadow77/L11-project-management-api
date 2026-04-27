<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'protect-docs' => \App\Http\Middleware\ProtectDocs::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Force JSON response for 403 (Unauthorized) errors
        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) {
            return response()->json([
                'message' => 'This action is unauthorized.'
            ], 403);
        });

        // Optional: Force JSON response for 404 (Not Found) errors
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->json([
                'message' => 'Resource not found.'
            ], 404);
        });

//        // 500 Internal Server Error
//        $exceptions->render(function (Exception $e, Request $request) {
//            // We check if the status code is not already set by the specific handlers above
//            if ($e->getStatusCode() === 500 || !$e->getStatusCode()) {
//                return response()->json([
//                    'message' => 'Internal Server Error.'
//                ], 500);
//            }
//
//            // If it's not a 500, let Laravel handle the normal flow
//            throw $e;
//        });

    })->create();
