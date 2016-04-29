<?php

/**
 * @requires extension gmp
 */
class UserIdTest extends PHPUnit_Framework_TestCase
{

    public function testTo32Bit()
    {
        $this->assertEquals('22785577', \Dotapi2\Util\UserId::to32Bit('76561197983051305'));
    }

    public function testTo64Bit()
    {
        $this->assertEquals('76561197983051305', \Dotapi2\Util\UserId::to64Bit('22785577'));
    }

}
