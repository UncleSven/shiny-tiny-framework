<?php

declare(strict_types = 1);

use ShinyTinyCore\App;

$app = new App(basePath: dirname(path: __DIR__));

/**
 * Config
 *******************************************************************************************************************/

# Enable it if you have your own cache storage path
# Default to: ./storage/framework/httpCache
/**
 * $app->config->set(key: 'cache_path', value: $app->basePath . '/storage/xyz');
 */

# Enable it if you have your own exception templates
#
# All exceptions with stack trace and previous exception
/**
 * $app->config->set(
 * key  : 'exception_view_path',
 * value: $app->basePath . '/resources/exception/exception.shine.php',
 * );
 */
# Http exceptions (e.g. 403, 404, 405)
/**
 * $app->config->set(
 * key  : 'exception_view_path_http',
 * value: $app->basePath . '/resources/exception/exception_http.shine.php',
 * );
 */

/**
 * Container
 *******************************************************************************************************************/

# Enable it if you have your own exception handler
/**
 * $app->container->bind(
 * abstract: \ShinyTinyCore\ExceptionHandler::class,
 * concrete: \App\Exception\ExceptionHandler::class,
 * );
 */
# Important: HttpResponseFactory::class should be bound within the container when you extend the core handler
/**
 * $app->container->bind(
 * abstract: \ShinyTinyCore\HttpResponseFactory::class,
 * concrete: \ShinyTinyCore\Http\Response\Factory::class,
 * );
 */

/**
 * Router
 *******************************************************************************************************************/

$app->router->defineGet(uri: '/', class: \App\Controller\WelcomeController::class, method: 'index');

/**
 *******************************************************************************************************************/
return $app;
