<?php

namespace ProjectVersioner;

use Herrera\Version\Version;

interface VcsInterface
{
    public function getVersion();
    public function setVersion(Version $version);
}
