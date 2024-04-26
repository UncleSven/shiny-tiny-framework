<?php

declare(strict_types = 1);

use ShinyTinyCore\App;

/*--------------------------------------------------------------------------------
| Create the application
|--------------------------------------------------------------------------------*/

$app = new App(basePath: dirname(path: __DIR__));

/*--------------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------------*/

// Enable it if you have your own cache storage path
// Default to: /storage/framework/httpCache
//
// $app->config->set(key: 'cache_path', value: $app->basePath . '/storage/xyz');

// Enable it if you have your own exception templates
// 1.) All exceptions with stack trace and previous exception
// 2.) Http exceptions (e.g. 403, 404, 405)
//
// $app->config->set(key: 'exception_view_path', value: $app->basePath . '/resources/exception/exception.shine.php');
// $app->config->set(key: 'exception_view_path_http', value: $app->basePath . '/resources/exception/exception_http.shine.php');

/*--------------------------------------------------------------------------------
| Container
|--------------------------------------------------------------------------------*/

// Enable it if you have your own exception handler
// Important: HttpResponseFactory::class should be bound within the container when you extend the core exception handler
//
// $app->container->bind(abstract: \ShinyTinyCore\ExceptionHandler::class, concrete: \App\Exception\ExceptionHandler::class);
// $app->container->bind(abstract: \ShinyTinyCore\HttpResponseFactory::class, concrete: \ShinyTinyCore\Http\Response\Factory::class);

$app->container->bind(
    abstract: \ShinyTinyCore\HttpResponseFactory::class,
    concrete: \ShinyTinyCore\Http\Response\Factory::class,
);

/*--------------------------------------------------------------------------------
| Router
|--------------------------------------------------------------------------------*/

$app->router->defineGet(uri: '/', class: \App\Controller\WelcomeController::class, method: 'index');

/*--------------------------------------------------------------------------------
| Return the application
|--------------------------------------------------------------------------------*/

return $app;
