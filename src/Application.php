<?php

namespace Groovey;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

// use Symfony\Component\EventDispatcher\EventDispatcherInterface;
// use Symfony\Component\HttpFoundation\BinaryFileResponse;
// use Symfony\Component\HttpKernel\HttpKernelInterface;
// use Symfony\Component\HttpKernel\TerminableInterface;
// use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
// use Symfony\Component\HttpKernel\Event\GetResponseEvent;
// use Symfony\Component\HttpKernel\Event\PostResponseEvent;
// use Symfony\Component\HttpKernel\Exception\HttpException;
// use Symfony\Component\HttpKernel\KernelEvents;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\HttpFoundation\StreamedResponse;
// use Symfony\Component\HttpFoundation\JsonResponse;

class Application
{
    private $container;

    public function __construct()
    {
        $container = new ContainerBuilder();
        return $this->container = $container;
    }

    public function get($value)
    {
        $container = $this->container;

        $container = $container->get($value);

        return $container;
    }

    public function register($id, $class = null)
    {
        $container = $this->container;

        $container = $container->register($id, $class);
        return $container;
    }
}
