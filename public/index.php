<?php

declare(strict_types = 1);

try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require __DIR__ . '/../bootstrap/app.php';
    $app->run();
} catch (Throwable $_t) {
    header(header: 'Content-Type: text/plain', response_code: 500);
    exit('Ops, something went wrong!');
}
