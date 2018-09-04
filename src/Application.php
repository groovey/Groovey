<?php

namespace Groovey;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\DebugClassLoader;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Application
{
    private $container;

    public function __construct()
    {
        $container = new ContainerBuilder();

        $this->container = $container;

        $this->register('dumper', 'Groovey\Providers\Dumper');
        $this->register('router', 'Groovey\Providers\Router');

        // Debug::enable();
        // ErrorHandler::register();
        // DebugClassLoader::enable();

        return $this->container;
    }

    public function register($id, $class = null)
    {
        $container = $this->container;
        $container->register($id, $class)->setArguments([$this]);

        $provider = $this->get($id);
        $provider->boot($this);

        return $container;
    }

    public function get($value = null)
    {
        $container = $this->container;
        $container = $container->get($value);

        return $container;
    }

    public function commands(array $values = [])
    {
    }

    public function mount($class)
    {
        $class = new $class();
        $class->route($this);
    }

    public function handle(Request $request)
    {
        $routes  = $this->get('router')->getRoutes();
        $context = new RequestContext();

        $context->fromRequest($request);

        $path    = $context->getPathInfo();
        $matcher = new UrlMatcher($routes, $context);

        try {

            $parameters = $matcher->match($path);
            $class      = $parameters['class'];
            $method     = $parameters['method'];
            $controller = new $class();

            return call_user_func_array([$controller, $method], [$this, $request]);
        } catch (ResourceNotFoundException $exception) {
            return new Response('Routing not found.', 404);
        } catch (\Exception $exception) {
            return new Response('An error occurred', 500);
        }
    }

    public function run(Request $request = null)
    {
        if (null === $request) {
            $request = Request::createFromGlobals();
        }

        $response = $this->handle($request);
        $response->send();
    }
}
