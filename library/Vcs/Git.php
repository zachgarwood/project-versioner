<?php
namespace ProjectVersioner\Vcs;

class Git implements \ProjectVersioner\VcsInterface
{
    public function getVersion()
    {
        $version = trim(shell_exec('git describe --tags --abbrev=0 2>&1'));

        if (strpos($version, 'No names found, cannot find anything.') !== false) {
            $version = '0.0.0';
        }

        return $version;
    }

    public function setVersion($version, $message = '')
    {
        exec("git tag -a $version -m \"$message\"");
        
        return $this->getVersion();
    }
}
