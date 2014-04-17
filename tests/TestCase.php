<?php
namespace ProjectVersioner;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public $versioner;

    public function commitAChange()
    {
        $uid = uniqid();
        touch($uid);
        exec("git add --all . && git commit -m \"$uid\"");
    }

    public function getFakeVersion()
    {
        return '1.2.3';
    }
    
    public function setUp()
    {
        chdir(__DIR__ . '/fixtures');
        exec('git init');
        $this->commitAChange();
        exec("git tag -a {$this->getFakeVersion()} -m \".\"");
        $this->versioner = new Versioner(new Vcs\Git);
    }

    public function tearDown()
    {
        chdir(__DIR__ . '/fixtures');
        exec('rm * && rm -rf .git');
    }
}
