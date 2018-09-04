<?php

require_once __DIR__.'/vendor/autoload.php';

// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler );
// $whoops->register();

// throw new RuntimeException("Oopsie!");

use Groovey\Application;

$app = new Application();

$app->get('dumper')->dump([$_SERVER]);

$app->mount('Groovey\Controllers\Sample');

$app->run();