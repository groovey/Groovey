<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

// use Groovey\Application;

class GrooveyTest extends TestCase
{
    public $app;

    public function setUp()
    {
        // $app = new Application();

        // $app['debug'] = true;

        // $this->app = $app;
    }

    public function testSamples(): void
    {
        $this->assertTrue(true);
        $this->assertEquals('user@example.com', 'user@example.com');
        $this->assertRegExp('/Groovey/', 'Groovey');
    }
}
