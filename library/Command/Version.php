<?php
namespace ProjectVersioner\Command;

use ProjectVersioner\Vcs;
use ProjectVersioner\Versioner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Version extends Command
{
    protected function configure()
    {
        $this
            ->setName('version')
            ->setDescription('Auto-version your project');
    }

    protected function execute(InputInterface $in, OutputInterface $out)
    {
        $versioner = new Versioner(new Vcs\Git);
        $out->writeln("Current version: {$versioner->getCurrentVersion()}");
        $dialog = $this->getHelperSet()->get('dialog');
        $releaseTypes = ['M' => 'Major', 'm' => 'Minor', 'p' => 'Patch'];
        $release = $dialog->select(
            $out,
            'What type of release is this?',
            $releaseTypes,
            'p'
        );
        $out->writeln($versioner->incrementVersion($releaseTypes[$release]));
    }
}
