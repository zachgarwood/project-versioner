<?php

namespace ProjectVersioner;

use Herrera\Version\Builder;
use Herrera\Version\Dumper;
use Herrera\Version\Version;

class VersionerTest extends TestCase
{
    public function testGetCurrentVersion()
    {
        $this->assertSame(
            Dumper::toString((new Builder)->importString($this->getFakeVersion())),
            $this->versioner->getCurrentVersion()
        );
    }

    public function testIncrementVersion()
    {
        $newVersion = (new Builder)->importString('1.2.4');
        $this->assertNotSame(
            $this->versioner->getCurrentVersion(),
            Dumper::toString($newVersion)
        );
        $this->commitAChange();
        $this->assertSame(
            Dumper::toString($newVersion),
            $this->versioner->incrementVersion('Patch')
        );
    }
}
