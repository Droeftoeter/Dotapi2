<?php
namespace Dotapi2\Tests\Entity;

class DetailedSlotTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Dotapi2\Entity\DetailedSlot
     */
    protected $entity;

    protected $data;

    public function setUp()
    {
        parent::setUp();

        $entityFactory = new \Dotapi2\Entity\EntityFactory();
        $matchData = json_decode(file_get_contents('./tests/Responses/getMatchDetails.json'), true);
        $this->data = $matchData['result']['players'][0];
        $this->entity = $entityFactory->create('DetailedSlot', $this->data);
    }

    public function testGetAbilityUpgrades()
    {
        $this->assertInstanceOf('\Dotapi2\Collection\AbilityUpgradeSequence', $this->entity->getAbilityUpgrades());
    }

    public function testGetKills()
    {
        $this->assertEquals($this->data['kills'], $this->entity->getKills());
    }

    public function testGetDeaths()
    {
        $this->assertEquals($this->data['deaths'], $this->entity->getDeaths());
    }

    public function testGetAssists()
    {
        $this->assertEquals($this->data['assists'], $this->entity->getAssists());
    }

    public function testGetLeaverStatus()
    {
        $this->assertEquals($this->data['leaver_status'], $this->entity->getLeaverStatus());
    }

    public function testGetGold()
    {
        $this->assertEquals($this->data['gold'], $this->entity->getGold());
    }

    public function testGetLastHits()
    {
        $this->assertEquals($this->data['last_hits'], $this->entity->getLastHits());
    }

    public function testGetDenies()
    {
        $this->assertEquals($this->data['denies'], $this->entity->getDenies());
    }

    public function testGetGoldPerMinute()
    {
        $this->assertEquals($this->data['gold_per_min'], $this->entity->getGoldPerMinute());
    }

    public function testGetExperiencePerMinute(){
        $this->assertEquals($this->data['xp_per_min'], $this->entity->getExperiencePerMinute());
    }

    public function testGetGoldSpent()
    {
        $this->assertEquals($this->data['gold_spent'], $this->entity->getGoldSpent());
    }

    public function testGetHeroDamage()
    {
        $this->assertEquals($this->data['hero_damage'], $this->entity->getHeroDamage());
    }

    public function testGetTowerDamage()
    {
        $this->assertEquals($this->data['tower_damage'], $this->entity->getTowerDamage());
    }

    public function testGetHeroHealing()
    {
        $this->assertEquals($this->data['hero_healing'], $this->entity->getHeroHealing());
    }

    public function testGetLevel()
    {
        $this->assertEquals($this->data['level'], $this->entity->getLevel());
    }

    public function testGetInventory()
    {
        $this->assertArraySubset([
            $this->data['item_0'],
            $this->data['item_1'],
            $this->data['item_2'],
            $this->data['item_3'],
            $this->data['item_4'],
            $this->data['item_5'],
        ], $this->entity->getInventory());
    }

}

