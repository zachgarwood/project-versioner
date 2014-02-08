<?php

namespace ProjectVersioner;

use Herrera\Version\Version;

class Versioner
{
    private $vcs;

    public function __construct(VcsInterface $vcs)
    {
        $this->vcs = new $vcs;
    }

    public function getVersion()
    {
        return $this->vcs->getVersion();
    }

    public function setVersion(Version $version)
    {
        return $this->vcs->setVersion($version);
    }
}
