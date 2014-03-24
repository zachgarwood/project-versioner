<?php

namespace ProjectVersioner;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CliTest extends TestCase
{
    public function testVersionCommand()
    {
        $prover = new Application('Prover Test');
        $prover->add(new Command\Version);
        $command = $prover->find('version');
        $commandTester = new CommandTester($command);
        $dialog = $command->getHelper('dialog');
        $dialog->setInputStream($this->setInput("M\n"));
        $commandTester->execute(array('command' => $command->getName()));
        $this->assertRegExp("/^Current version: {$this->getFakeVersion()}/", $commandTester->getDisplay());
    }

    public function setInput($input)
    {
        $stream = fopen('php://memory', 'r+', false);
        fputs($stream, $input);
        rewind($stream);

        return $stream;
    }
}
