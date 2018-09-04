<?php

namespace Groovey\Controllers;

use Groovey\Application;
use Groovey\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

class Sample implements ControllerInterface
{
    public function route(Application $app)
    {
        $router = $app->get("router");
        $router->add('/', [$this, 'index']);
        $router->add('/sample', [$this, 'sample']);

        return;
    }

    public function index(Application $app, Request $request)
    {
        dump("Index Page");

        $method = $request->getMethod();

        dump('method = ' . $method);

        return new Response();
    }


    public function sample(Application $app, Request $request)
    {
        dump("Sample Page");
        return new Response();
    }
}
