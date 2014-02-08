<?php

namespace ProjectVersioner;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CliTest extends TestCase
{
    public function testVersionCommand()
    {
        $prover = new Application('Prover Test');
        $commandTester = new CommandTester($prover->add(new Command\Version));
        $commandTester->execute(array('command' => 'version'));
        $this->assertRegExp('/^Current version: /', $commandTester->getDisplay());
    } 
}
