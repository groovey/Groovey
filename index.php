<?php

require_once __DIR__.'/vendor/autoload.php';

use Groovey\Application;

$app = new Application();

$app->register('dumper', 'Groovey\Providers\Dumper');
    // ->addArgument(['test']);

$app->register('router', 'Groovey\Providers\Router');


$dumper = $app->get('dumper');
$dumper->dump(['test']);

$app->mount('Groovey\Controllers\Sample');


$app->run();