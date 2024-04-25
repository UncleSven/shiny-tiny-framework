<?php

declare(strict_types = 1);

use ShinyTinyCore\Http\Response\HtmlResponse;
use ShinyTinyCore\Shine\Shine;

// This stuff is required by the following sections within this file

/** @var HtmlResponse $this */
Shine::init(
    data    : $this->data,
    charset : $this->charset,
    language: $this->language,
    locale  : $this->locale,
    path    : dirname(path: __DIR__) . '/',
);

$f = Shine::rawData(key: 'framework_name') . ' version ' . Shine::rawData(key: 'framework_version');
$c = Shine::rawData(key: 'core_name') . ' version ' . Shine::rawData(key: 'core_version');

Shine::setSection(name: 'main.title', content: 'Welcome to Shiny-Tiny Framework');
Shine::captureSection();
?>
    <div id="content_welcome">
        <div class="container">
            <h1><?php
                Shine::section(name: 'main.title'); ?></h1>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
                dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        </div>
        <div class="container">
            <img class="sunshine" src="/images/shiny-tiny.jpg" alt="<?php
            Shine::echoData(key: 'framework_name'); ?>">
        </div>
        <div class="container">
            <h2>About</h2>
            <p><a href="<?php
                Shine::echoData(key: 'framework_url'); ?>"><?php
                    Shine::echo(value: $f); ?></a></p>
            <p><a href="<?php
                Shine::echoData(key: 'core_url'); ?>"><?php
                    Shine::echo(value: $c); ?></a></p>
        </div>
    </div>
<?php
// This stuff is needed by previous sections
Shine::setCapturedSection(name: 'main.content');
Shine::extendSection(name: 'main.css', content: Shine::minifyCssFile(filename: 'welcome/welcome.css'));
Shine::extend(view: 'main.shine.php');
Shine::close();
