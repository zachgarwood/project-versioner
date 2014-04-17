<?php
namespace ProjectVersioner;

interface VcsInterface
{
    public function getVersion();
    public function setVersion($version);
}
