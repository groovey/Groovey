<?php

namespace Groovey\Providers;

use Groovey\Application;
use Groovey\Interfaces\ProviderInterface;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Router implements ProviderInterface
{
    private $routes;

    public function __construct(Application $app)
    {
        $this->routes = new RouteCollection();
    }

    public function add($pattern, array $parts = [])
    {
        $routes     = $this->routes;
        $class      = get_class($parts[0]);
        $method     = $parts[1];
        $instance   = new $class();
        $reflection = new \ReflectionClass($instance);
        $className  = $reflection->getShortName();
        $index      = strtolower($className . '_' . $method);
        $$index     = new Route($pattern, array('controller' => $class, 'method' => $method));

        $routes->add($index, $$index);
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function boot(Application $app)
    {
    }
}
