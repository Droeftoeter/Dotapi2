<?php
namespace Dotapi2\Tests\Collection;

use Dotapi2\Collection\CollectionFactory;
use Dotapi2\Collection\Slot;
use Dotapi2\Types\Teams;

class SlotTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Slot
     */
    protected $collection;

    public function setUp()
    {
        parent::setUp();
        $collectionFactory = new CollectionFactory();
        $this->collection = $collectionFactory->create('Slot', [
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
                [
                    'account_id' => 319242370,
                    'player_slot' => 2,
                    'hero_id' => 89
                ],
                [
                    'account_id' => 4294967295,
                    'player_slot' => 3,
                    'hero_id' => 15
                ],
                [
                    'account_id' => 136600575,
                    'player_slot' => 4,
                    'hero_id' => 51
                ],
                [
                    'account_id' => 4294967295,
                    'player_slot' => 128,
                    'hero_id' => 76
                ],
                [
                    'account_id' => 118997978,
                    'player_slot' => 129,
                    'hero_id' => 45
                ],
                [
                    'account_id' => 92987127,
                    'player_slot' => 130,
                    'hero_id' => 80
                ],
                [
                    'account_id' => 4294967295,
                    'player_slot' => 131,
                    'hero_id' => 31
                ],
                [
                    'account_id' => 4294967295,
                    'player_slot' => 132,
                    'hero_id' => 30
                ],
            ]
        ]);
    }

    public function testGetByTeamDire()
    {
        $teamDire = $this->collection->getByTeam(Teams::DIRE);
        $playerIds = array_map(function(\Dotapi2\Entity\Slot $slot){
            return $slot->getId();
        }, iterator_to_array($teamDire));

        $this->assertContains(92987127, $playerIds);
    }

    public function testGetByTeamRadiant()
    {
        $teamRadiant = $this->collection->getByTeam(Teams::RADIANT);
        $playerIds = array_map(function(\Dotapi2\Entity\Slot $slot){
            return $slot->getId();
        }, iterator_to_array($teamRadiant));

        $this->assertContains(22785577, $playerIds);
    }

    public function testGetDire()
    {
        $teamDire = $this->collection->getDire();
        $playerIds = array_map(function(\Dotapi2\Entity\Slot $slot){
            return $slot->getId();
        }, iterator_to_array($teamDire));

        $this->assertContains(92987127, $playerIds);
    }

    public function testGetRadiant()
    {
        $teamRadiant = $this->collection->getRadiant();
        $playerIds = array_map(function(\Dotapi2\Entity\Slot $slot){
            return $slot->getId();
        }, iterator_to_array($teamRadiant));

        $this->assertContains(22785577, $playerIds);
    }

}

