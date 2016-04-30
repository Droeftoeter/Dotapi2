<?php
namespace Dotapi2\Tests\Collection;

use Dotapi2\Collection\CollectionFactory;
use Dotapi2\Collection\PickBanSequence;

class PickBanSequenceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PickBanSequence
     */
    protected $collection;

    public function setUp()
    {
        parent::setUp();
        $collectionFactory = new CollectionFactory();
        $this->collection = $collectionFactory->create('PickBanSequence', [
            'picks_bans' => [
                [
                    'is_pick' => false,
                    'team' => 1,
                    'order' => 0
                ],
                [
                    'is_pick' => false,
                    'team' => 0,
                    'order' => 1
                ],
                [
                    'is_pick' => false,
                    'team' => 1,
                    'order' => 2
                ],
                [
                    'is_pick' => false,
                    'team' => 0,
                    'order' => 3
                ],
                [
                    'is_pick' => true,
                    'team' => 0,
                    'order' => 5
                ],
            ]
        ]);
    }

    public function testGetPicks()
    {
        $this->assertEquals(1, $this->collection->getPicks()->count());
    }

    public function testGetBans()
    {
        $this->assertEquals(4, $this->collection->getBans()->count());
    }

}

