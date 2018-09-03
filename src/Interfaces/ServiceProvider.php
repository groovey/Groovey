<?php

namespace Groovey\Interfaces;

use Symfony\Component\DependencyInjection\ContainerBuilder;

interface ServiceProvider
{
    public function boot(ContainerBuilder $container);
}
