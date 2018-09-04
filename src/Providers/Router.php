<?php

namespace Groovey\Providers;

use Groovey\Application;
use Groovey\Interfaces\ServiceProvider;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Router implements ServiceProvider
{

    private $routes;

    public function __construct(Application $app)
    {
        $this->routes = new RouteCollection();
    }

    public function add($pattern, array $parts = [])
    {

        $class  = get_class($parts[0]);
        $method = $parts[1];
        // print '\n====> ' . $class . $method;

        // $foo_route = new Route($pattern, array('controller' => 'Sample', 'method' => 'yow'));


        $o = new $class();


        call_user_func_array([$o, 'index'] , ['one', 'two22']);


        $reflect = new \ReflectionClass($o);
        print $reflect->getShortName();
        // if ($reflect->getShortName() === 'Name') {
        //     // do this
        // }


        // $routes->add('')


    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function boot(Application $app)
    {
    }
}
