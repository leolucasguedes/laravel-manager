<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * lista de exceções que não são reportadas.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * lista de inputs que nunca serão exibidos nas exceções de validação.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Registra os manipuladores de exceção para a aplicação.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Trata exceções e retorna respostas customizadas para JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception): Response
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $exception->errors(),
            ], 422);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'message' => 'Não autenticado',
            ], 401);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Recurso não encontrado',
            ], 404);
        }

        return parent::render($request, $exception);
    }
}
