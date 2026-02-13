<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
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
        /**
         * CSRF / Session expired (TokenMismatchException)
         * - Hide technical error text from user
         * - Show friendly message instead
         */
        $this->renderable(function (TokenMismatchException $e, $request) {
            // For AJAX / fetch requests
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Session expired. Please refresh the page and try again.'
                ], 419);
            }

            // For normal browser requests
            return redirect()
                ->back()
                ->withInput($request->except(['password', 'password_confirmation']))
                ->with('error', 'Session expired. Please refresh the page and try again.');
        });
    }
}
