<?php

namespace Sco\ActionLog;

class FactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testWebIsTrue()
    {
        $factory = new Factory();
        $this->assertEquals($factory->web('test', 'test_web', 'test_table'));
    }
}
