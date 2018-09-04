<?php

namespace Groovey\Controllers;


use Groovey\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

class Sample
// implements ControllerProviderInterface
{
    public function route(Application $app)
    {

        $router = $app->get("router");
        $router->add('/foo', [$this, 'index']);
        // $router->add('/foo_bar', [$this, 'index2']);

        // $foo_route = new Route('/foo', array('controller' => 'Sample', 'method' => 'yow'));

        // $routes = new RouteCollection();
        // $routes->add('foo_route', $foo_route);

        // $context = new RequestContext();
        // $context->fromRequest(Request::createFromGlobals());

        // $matcher = new UrlMatcher($routes, $context);

        // // $parameters = $matcher->match($context->getPathInfo());
        // $parameters = $matcher->match('/foo');
        // print_r($parameters);



        // print_r($this);

        return;
    }


    public function index()
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
