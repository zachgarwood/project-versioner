<?php
namespace ProjectVersioner\Vcs;

interface VcsInterface
{
    public function getVersion();
    public function setVersion($version, $message = '');
}
