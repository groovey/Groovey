<?php

require_once __DIR__.'/vendor/autoload.php';

// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler );
// $whoops->register();

// throw new RuntimeException("Oopsie!");

use Groovey\Application;
use Symfony\Component\HttpFoundation\Request;

class App extends Application
{
    use Groovey\Traits\Trace;
}

$app = new App();
$app->debug(true);

$app->get('dumper')->dump([$_SERVER]);

$app->mount('Groovey\Controllers\Sample');

//
// $app->before(function () use ($app) {
//     echo 'before';
//     return;
// });

// $app->after(function (Request $request) use ($app) {
//     echo 'after';
// });
$app->trace('abc');



$app->run();
