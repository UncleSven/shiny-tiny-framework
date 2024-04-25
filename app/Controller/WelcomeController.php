<?php

declare(strict_types = 1);

namespace App\Controller;

use ShinyTinyCore\Config;
use ShinyTinyCore\Controller;
use ShinyTinyCore\Http\Response\HtmlResponse;
use ShinyTinyCore\HttpResponse;
use ShinyTinyCore\Request;

/**
 * It is mandatory to extend the core controller for each controller you define
 * All parameters of the constructor are automatically wired
 * All parameters in each method defined by route are automatically wired
 */
final class WelcomeController extends Controller
{
    public function index(Config $config, Request $request): HttpResponse
    {
        /**
         * Alternatively, you can also inject the response factory as a parameter
         * The response must have implemented the HttpResponse interface
         */
        return new HtmlResponse(
            data: [
                      'core_name'         => $config->getString(key: 'shiny_tiny_core_name', default: ''),
                      'core_url'          => $config->getString(key: 'shiny_tiny_core_url', default: ''),
                      'core_version'      => $config->getString(key: 'shiny_tiny_core_version', default: ''),
                      'framework_name'    => $config->getString(key: 'shiny_tiny_framework_name', default: ''),
                      'framework_url'     => $config->getString(key: 'shiny_tiny_framework_url', default: ''),
                      'framework_version' => $config->getString(key: 'shiny_tiny_framework_version', default: ''),
                  ],
            view: $this->resources . '/welcome/welcome.shine.php',
        );
    }

    /**
     * This method is optional
     */
    public function isLocked(Request $request): bool
    {
        /**
         * Perform your validation here
         * If false is returned, the user receives a 403 Forbidden response
         */
        return false;
    }
}
