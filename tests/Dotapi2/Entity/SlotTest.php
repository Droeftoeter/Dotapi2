<?php
namespace Dotapi2\Tests\Entity;

use Dotapi2\Entity\EntityFactory;

class SlotTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Dotapi2\Entity\Slot
     */
    protected $entity;


    protected $data;

    public function setUp()
    {
        parent::setUp();

        $entityFactory = new EntityFactory();
        $matchData = json_decode(file_get_contents('./tests/Responses/getMatchHistory.json'), true);
        $this->data = $matchData['result']['matches'][0]['players'][0];
        $this->entity = $entityFactory->create('Slot', $this->data);
    }

    public function testGetHeroId()
    {
        $this->assertEquals($this->data['hero_id'], $this->entity->getHeroId());
    }

    public function testGetTeam(){
        $entityFactory = new EntityFactory();
        $entity = $entityFactory->create('Slot', ['player_slot' => 4]);

        $this->assertEquals(0, $entity->getTeam());
    }

    public function testGetSlot(){
        $entityFactory = new EntityFactory();
        $entity = $entityFactory->create('Slot', ['player_slot' => 4]);

        $this->assertEquals(4, $entity->getSlot());
    }

}

