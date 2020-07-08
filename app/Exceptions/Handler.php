<?php

namespace App\Exceptions;

use App\Traits\Api\v1\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        /**
         * If formRequest validations fails, throw 422 with validtion errors
         */
        if ($exception instanceof ValidationException) {
            return $this->response(false, 422, config('http_responses.422'), $exception->errors());
        }

        /**
         * If a resource from a Model wasn't found, throw 404
         */
        if ($exception instanceof ModelNotFoundException) {
            return $this->response(false, 404, config('http_responses.404'), []);
        }

        /**
         * If the Method from the route isn't allowed, throw 405
         */
        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->response(false, 405, config('http_responses.405'), []);
        }

        /**
         * If some resource wasn't found, throw 404
         */
        if ($exception instanceof NotFoundHttpException) {
            return $this->response(false, 404, config('http_responses.404'), []);
        }

        return parent::render($request, $exception);
    }
}
