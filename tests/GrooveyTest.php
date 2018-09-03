<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

use Groovey\Application;

class GrooveyTest extends TestCase
{
    public $app;

    public function setUp()
    {
        $app = new Application();

        $mailer = $app->get('mailer');
        // print_r($mailer);

         // $app['mailer'] = true;

        // $this->app = $app;
    }

    public function testSamples(): void
    {
        $this->assertTrue(true);
        $this->assertEquals('user@example.com', 'user@example.com');
        $this->assertRegExp('/Groovey/', 'Groovey');
    }
}
