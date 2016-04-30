<?php

class CollectionFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testExceptionCollectionNotExists()
    {
        $this->expectException('\Dotapi2\Exceptions\Exception');
        $factory = new \Dotapi2\Collection\CollectionFactory();
        $factory->create('DoesNotExist', []);
    }

}

