<?php
namespace Dotapi2\Tests\Entity;

use Dotapi2\Entity\EntityFactory;
use Dotapi2\Entity\TowerStatus;

class TowerStatusTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TowerStatus
     */
    protected $entity;

    public function setUp()
    {
        parent::setUp();

        $factory = new EntityFactory();
        $this->entity = $factory->create('TowerStatus', [1975]);
    }

    public function testGetRaw()
    {
        $this->assertEquals(1975, $this->entity->getRaw());
    }

    public function testIsAncientTopDestroyed()
    {
        $this->assertEquals(false, $this->entity->isAncientTopDestroyed());
    }

    public function testIsAncientBottomDestroyed()
    {
        $this->assertEquals(false, $this->entity->isAncientBottomDestroyed());
    }

    public function testIsBottomTier3Destroyed()
    {
        $this->assertEquals(false, $this->entity->isBottomTier3Destroyed());
    }

    public function testIsBottomTier2Destroyed()
    {
        $this->assertEquals(false, $this->entity->isBottomTier2Destroyed());
    }

    public function testIsBottomTier1Destroyed()
    {
        $this->assertEquals(true, $this->entity->isBottomTier1Destroyed());
    }

    public function testIsMiddleTier3Destroyed()
    {
        $this->assertEquals(false, $this->entity->isMiddleTier3Destroyed());
    }

    public function testIsMiddleTier2Destroyed()
    {
        $this->assertEquals(false, $this->entity->isMiddleTier2Destroyed());
    }

    public function testIsMiddleTier1Destroyed()
    {
        $this->assertEquals(true, $this->entity->isMiddleTier1Destroyed());
    }

    public function testIsTopTier3Destroyed()
    {
        $this->assertEquals(false, $this->entity->isTopTier3Destroyed());
    }

    public function testIsTopTier2Destroyed()
    {
        $this->assertEquals(false, $this->entity->isTopTier2Destroyed());
    }

    public function testIsTopTier1Destroyed()
    {
        $this->assertEquals(false, $this->entity->isTopTier1Destroyed());
    }

}

