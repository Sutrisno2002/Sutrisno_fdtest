<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * render
     *
     * @param  Request $request
     * @param  Throwable $exception
     * @return void
     */
    public function render($request, Throwable $exception)
    {
        if (
            env('APP_ENV') == 'production' &&
            !$request->wantsJson() &&
            !$exception instanceof \Illuminate\Validation\ValidationException  &&
            !$exception instanceof \Illuminate\Auth\AuthenticationException
        ) {
            $statusCode = $exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException
            ? $exception->getStatusCode()
            : 500;

            if ($request->routeIs('administrator.*') || $request->routeIs('core.*') || $request->routeIs('auth.*')) {
                return response()->view('administrator::errors.' . $statusCode, ['exception' => $exception], $statusCode);
            }

            if ($request->routeIs('front.*') || $request->routeIs('customer.*')) {
                return response()->view('front::errors.' . $statusCode, ['exception' => $exception], $statusCode);
            }
        }

        return parent::render($request, $exception);
    }
}
