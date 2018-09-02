<?php

use Groovey\Application;

class GrooveyTest extends PHPUnit_Framework_TestCase
{
    public $app;

    public function setUp()
    {
        $app = new Application();

        $app['debug'] = true;

        $this->app = $app;
    }

}