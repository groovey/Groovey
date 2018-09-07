<?php

require_once __DIR__.'/vendor/autoload.php';

// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler );
// $whoops->register();

// throw new RuntimeException("Oopsie!");

use Groovey\Application;

class App extends Application
{
    use Groovey\Traits\Trace;
}

$app = new App();
$app->debug(true);

$app->get('dumper')->dump([$_SERVER]);

$app->before(['Groovey\Middlewares\Before']);
$app->after(['Groovey\Middlewares\After']);

$app->mount('Groovey\Controllers\Sample');

$app->run();
