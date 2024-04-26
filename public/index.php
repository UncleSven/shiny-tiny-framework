<?php

declare(strict_types = 1);

try {
    $dir = dirname(path: __DIR__);

    require $dir . '/vendor/autoload.php';

    $app = require $dir . '/bootstrap/app.php';
    $app->run();

} catch (Throwable $_t) {
    header(header: 'Content-Type: text/plain', response_code: 500);
    exit('Ops, something went wrong!');
}
