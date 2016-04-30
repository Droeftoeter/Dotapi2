<?php

class PickBanTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Dotapi2\Entity\PickBan
     */
    protected $entity;

    public function setUp()
    {
        parent::setUp();
        $entityFactory = new \Dotapi2\Entity\EntityFactory();
        $this->entity = $entityFactory->create('PickBan', [
            'hero_id' => 67,
            'team' => 1,
            'order' => 1,
        ]);
    }

    public function testGetTeam()
    {
        $this->assertEquals(1, $this->entity->getTeam());
    }

    public function testGetHeroId()
    {
        $this->assertEquals(67, $this->entity->getHeroId());
    }

    public function testIsPick()
    {
        $this->assertEquals(false, $this->entity->isPick());
    }

    public function testIsBan()
    {
        $this->assertEquals(true, $this->entity->isBan());
    }

}

