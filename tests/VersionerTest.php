<?php

namespace ProjectVersioner;

use Herrera\Version\Builder;
use Herrera\Version\Dumper;
use Herrera\Version\Version;

class VersionerTest extends TestCase
{
    public function testGetVersion()
    {
        $this->assertSame(
            Dumper::toString((new Builder)->importString($this->getFakeVersion())),
            Dumper::toString($this->versioner->getVersion())
        );
    }

    public function testSetVersion()
    {
        $newVersion = (new Builder)->importString('1.2.4-beta');
        $this->assertNotSame(
            Dumper::toString($this->versioner->getVersion()),
            Dumper::toString($newVersion)
        );
        $this->commitAChange();
        $this->assertSame(
            Dumper::toString($newVersion),
            Dumper::toString($this->versioner->setVersion($newVersion))
        );
    }
}
