<?php

declare(strict_types = 1);

namespace App\Exception;

use ShinyTinyCore\Exception\ExceptionHandler as CoreExceptionHandler;
use ShinyTinyCore\HttpResponse;
use Throwable;

/**
 * It is not necessary to extend the core handler, but it is important to implement the ExceptionHandler interface
 */
final class ExceptionHandler extends CoreExceptionHandler
{
    public function handle(Throwable $throwable): HttpResponse
    {
        /**
         * You can use the output handling of the parent handler
         * Important: \ShinyTinyCore\HttpResponseFactory::class should be bound within the container
         */
        return parent::handle(throwable: $throwable);
    }
}
