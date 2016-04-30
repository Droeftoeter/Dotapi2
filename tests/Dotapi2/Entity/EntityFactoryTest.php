<?php

class EntityFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testExceptionEntityNotExists()
    {
        $this->expectException('\Dotapi2\Exceptions\Exception');
        $factory = new \Dotapi2\Entity\EntityFactory();
        $factory->create('DoesNotExist', []);
    }

}

