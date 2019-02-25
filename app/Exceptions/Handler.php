<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Config;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // This will replace our 404 response with a JSON response.
        // https://www.toptal.com/laravel/restful-laravel-api-tutorial
        if (($request->expectsJson()  || $request->is('api/*')) && $exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        if (($request->expectsJson()  || $request->is('api/*'))
            && get_class($exception) !== "Illuminate\Validation\ValidationException"
            && get_class($exception) !== "Illuminate\Session\TokenMismatchException"
        ){

            $error = $this->convertExceptionToResponse($exception);
            $response = [];
            $response['code'] = $error->getStatusCode();

            if($error->getStatusCode() == 500) {
                $response['error'] = $exception->getMessage();
                if(Config::get('app.debug')) {
                    $response['trace'] = $exception->getTraceAsString();
                    $response['code'] = $exception->getCode();
                }
            }

            if(get_class($exception) === "Illuminate\Session\TokenMismatchException"){
                $response['error'] = "CSRF-Token invalid. Please refresh the page.";
                $response['code'] = "419";
            }

            return response()->json($response, $response['code']);
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
    {
        if ($request->expectsJson()  || $request->is('api/*')) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
        return redirect()->guest(route('login'));
    }

    public function unauthorized($request, AuthorizationException $exception){
        if($request->expectsJson() || $request->is('api/*')){
            return response()->json("You don't have permission to do this",401);
        }
        return redirect()->guest('login');
    }
}
