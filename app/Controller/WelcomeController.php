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
        $coreUrl  = $config->getString(key: 'shiny_tiny_core_url', default: '');
        $coreName = sprintf(
            '%s version %s',
            $config->getString(key: 'shiny_tiny_core_name', default: ''),
            $config->getString(key: 'shiny_tiny_core_version', default: ''),
        );

        $frameworkUrl  = $config->getString(key: 'shiny_tiny_framework_url', default: '');
        $frameworkName = sprintf(
            '%s version %s',
            $config->getString(key: 'shiny_tiny_framework_name', default: ''),
            $config->getString(key: 'shiny_tiny_framework_version', default: ''),
        );

        /**
         * Alternatively, you can also inject the HttpResponseFactory as a parameter
         * The response must have implemented the HttpResponse interface
         */
        return new HtmlResponse(
            data: [
                      'core_name'      => $coreName,
                      'core_url'       => $coreUrl,
                      'framework_name' => $frameworkName,
                      'framework_url'  => $frameworkUrl,
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
