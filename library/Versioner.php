<?php
namespace ProjectVersioner;

use Herrera\Version\Builder;
use Herrera\Version\Dumper; 
use Herrera\Version\Version; 

class Versioner
{
    private $vcs;

    public function __construct(VcsInterface $vcs)
    {
        $this->vcs = new $vcs;
    }

    public function getCurrentVersion()
    {
        return Dumper::toString($this->getVersion());
    }

    public function incrementVersion($releaseType)
    {
        $version = $this->getVersion();
        $version->clearPreRelease();
        $version->{"increment$releaseType"}();
        $this->setVersion($version);

        return $this->getCurrentVersion();
    }

    private function getVersion()
    {
        return (new Builder)->importString($this->vcs->getVersion());
    }

    private function setVersion(Version $version)
    {
        return (new Builder)->importString($this->vcs->setVersion(Dumper::toString($version)));
    }
}
