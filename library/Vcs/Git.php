<?php

namespace ProjectVersioner\Vcs;

use Herrera\Version\Builder;
use Herrera\Version\Dumper; 
use Herrera\Version\Version; 

class Git implements \ProjectVersioner\VcsInterface
{
    public function getVersion()
    {
        exec('git describe --tags', $output);

        return (new Builder)->importString($output[0]);
    }

    public function setVersion(Version $version)
    {
        $tag = Dumper::toString($version);
        exec("git tag -a $tag -m \".\"");
        
        return $this->getVersion();
    }
}
