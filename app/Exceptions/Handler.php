<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Config;
use Throwable;

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

    public function render($request, Throwable $e)
    {
        $error = $this->convertExceptionToResponse($e);
        if ($error->getStatusCode() == 419) {
            redirect('/', 302);
        }
        return parent::render($request, $e);
    }


    // $response = [];
    //    $response['error'] = $e->getMessage();
    //    if(Config::get('app.debug')) {
    //        $response['trace'] = $e->getTraceAsString();
    //        $response['code'] = $e->getCode();
    //    }

    //    return response()->json($response, $error->getStatusCode());
    // public function render($request, Throwable $exception)
    // {

}
