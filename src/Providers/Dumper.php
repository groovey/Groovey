<?php

namespace Groovey\Providers;

use Groovey\Application;
use Groovey\Interfaces\ServiceProvider;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class Dumper implements ServiceProvider
{
    public function __construct(Application $app)
    {
        return new VarDumper();
    }

    public function dump($value = null)
    {
        dump($value);
    }

    public function boot(Application $app)
    {
        VarDumper::setHandler(function ($var) {
            $cloner = new VarCloner();
            $dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();

            $dumper->dump($cloner->cloneVar($var));
        });
    }
}
