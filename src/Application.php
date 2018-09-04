<?php

namespace Groovey;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class Application
{
    private $container;

    public function __construct()
    {
        $container = new ContainerBuilder();

        return $this->container = $container;
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

        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();


    }


    public function run(Request $request = null)
    {
        if (null === $request) {
            $request = Request::createFromGlobals();
        }

        $response = $this->handle($request);
        // $response->send();



    }
}
