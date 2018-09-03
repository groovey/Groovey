<?php
require_once __DIR__.'/vendor/autoload.php';

use Groovey\Application;

use Symfony\Component\DependencyInjection\ContainerBuilder;





class Mailer
{
    // private $transport;
    public $values;

    public function __construct($values)
    {

        $this->values = $values;

    }

    public function test()
    {
        print 'hoi ikaw na!';

    }


}


$app = new Application();

$app->register('mailer', 'Mailer')
    ->addArgument(['aaa', 'bbb']);

$mailer = $app->get('mailer');
$mailer->test();



