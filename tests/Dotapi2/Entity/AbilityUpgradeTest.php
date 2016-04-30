<?php
namespace Dotapi2\Tests\Entity;

class AbilityUpgradeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Dotapi2\Entity\AbilityUpgrade
     */
    protected $entity;

    protected $data;

    public function setUp()
    {
        parent::setUp();

        $entityFactory = new \Dotapi2\Entity\EntityFactory();
        $matchData = json_decode(file_get_contents('./tests/Responses/getMatchDetails.json'), true);
        $this->data = $matchData['result']['players'][0]['ability_upgrades'][1];
        $this->entity = $entityFactory->create('AbilityUpgrade', $this->data);
    }

    public function testGetAbilityId()
    {
        $this->assertEquals($this->data['ability'], $this->entity->getAbilityId());
    }

    public function testGetTime()
    {
        $this->assertEquals($this->data['time'], $this->entity->getTime());
    }

    public function testGetLevel()
    {
        $this->assertEquals($this->data['level'], $this->entity->getLevel());
    }

}

