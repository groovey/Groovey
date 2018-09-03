<?php

namespace Groovey;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

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
        $container->register($id, $class);

        $provider = $this->get($id);
        $provider->boot($container);

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

    public function mount()
    {
    }
}
