<?php
namespace Dotapi2\Tests\Collection;

use Dotapi2\Collection\Collection;
use Dotapi2\Collection\CollectionFactory;

class CollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Collection
     */
    protected $collection;

    public function setUp()
    {
        parent::setUp();
        $collectionFactory = new CollectionFactory();
        $this->collection = $collectionFactory->create('Collection', [
            'results_remaining' => 490,
            'total_results' => 500
        ]);
    }

    public function testIsPaginated()
    {
        $this->assertEquals(true, $this->collection->isPaginated());
    }

    public function testGetRemainingResults()
    {
        $this->assertEquals(490, $this->collection->getRemainingResults());
    }

    public function testGetTotalResults()
    {
        $this->assertEquals(500, $this->collection->getTotalResults());
    }

    public function testCount()
    {
        $this->assertEquals(0, $this->collection->count());
    }

    public function testOffsetGet()
    {
        $this->assertEquals(null, $this->collection[0]);
    }

    public function testOffsetExists()
    {
        $this->assertEquals(false, isset($this->collection[0]));
    }

    public function testOffsetSet()
    {
        $this->expectException('\Dotapi2\Exceptions\Exception');
        $this->collection[0] = 'test';
    }

    public function testOffseUnset()
    {
        $this->expectException('\Dotapi2\Exceptions\Exception');
        unset($this->collection[0]);
    }

    public function testFirst()
    {
        $this->assertEquals(null, $this->collection->first());
    }

    public function testGetIterator()
    {
        $this->assertInstanceOf('\ArrayIterator', $this->collection->getIterator());
    }

}

