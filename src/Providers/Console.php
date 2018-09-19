<?php

namespace Groovey\Providers;

use Groovey\Application;
use Groovey\Interfaces\ProviderInterface;
use Symfony\Component\Console\Application as AppConsole;

class Console implements ProviderInterface
{
    public $container;

    public function __construct(Application $app)
    {
        $this->container = new AppConsole();

        return $this;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function run()
    {
        $container = $this->getContainer();

        return $container->run();
    }

    public function add($classes)
    {
        $container = $this->getContainer();
        if (is_array($classes)) {
            foreach ($classes as $class) {
                $container->add(new $class());
            }
        }
    }

    public function boot(Application $app)
    {
    }
}
