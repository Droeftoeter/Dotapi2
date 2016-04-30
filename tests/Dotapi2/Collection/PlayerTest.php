<?php
namespace Dotapi2\Tests\Collection;

use Dotapi2\Collection\CollectionFactory;
use Dotapi2\Collection\Player;

class PlayerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Player
     */
    protected $collection;

    public function setUp()
    {
        parent::setUp();
        $collectionFactory = new CollectionFactory();
        $this->collection = $collectionFactory->create('Player', [
            'players' => [
                [
                    'account_id' => 22785577,
                    'player_slot' => 0,
                    'hero_id' => 50
                ],
                [
                    'account_id' => 249464271,
                    'player_slot' => 1,
                    'hero_id' => 13
                ],
            ]
        ]);
    }

    public function testGetById()
    {
        $this->assertInstanceOf('\Dotapi2\Entity\Player', $this->collection->getById(22785577));
    }

    public function testGetByIdNotExists()
    {
        $this->assertEquals(null, $this->collection->getById(000034));
    }

}

