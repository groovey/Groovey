<?php

namespace Groovey\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Sample extends Command
{
    public function configure()
    {
        $this
            ->setName('sample:test')
            ->setDescription('Test command.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $about = <<<TEST
 <comment>
    ______
   / ____/________  ____ _   _____  __  __
  / / __/ ___/ __ \/ __ \ | / / _ \/ / / /
 / /_/ / /  / /_/ / /_/ / |/ /  __/ /_/ /
 \____/_/   \____/\____/|___/\___/\__, /
                                 /____/
 </comment>

 Author: Harold Kim Cantil <pokoot@gmail.com>

 Crafted with love.

TEST;

        $output->writeln($about);
    }
}
