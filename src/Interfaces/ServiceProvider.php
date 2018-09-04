<?php

namespace Groovey\Interfaces;

// use Symfony\Component\DependencyInjection\ContainerBuilder;
use Groovey\Application;

interface ServiceProvider
{
    public function boot(Application $app);
}
