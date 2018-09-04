<?php

namespace Groovey\Controllers;

use Groovey\Application;
use Groovey\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

class Sample implements ControllerInterface
{
    public function route(Application $app)
    {
        $router = $app->get("router");
        $router->add('/foo', [$this, 'index']);


        $context = new RequestContext();
        $matcher = new UrlMatcher($router->getRoutes(), $context);
        $parameters = $matcher->match('/foo');
        // call_user_func_array([$o, 'index'] , ['one', 'two22']);
        // print_r($parameters);


        return;
    }


    public function index(Application $app)
    {

        // print $two;

        // $this->test();

        // $app->debug('Welcome!');
        // // $app->debug('App name = '.$app['config']'app.name'));
        // $app->debug($app);
        // // $app->debug(new User($app));

        // return new Response('End');
    }
}
