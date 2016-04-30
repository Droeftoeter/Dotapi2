<?php
namespace Dotapi2\Tests\Entity;

use Dotapi2\Entity\EntityFactory;
use Dotapi2\Entity\BarracksStatus;

class BarracksStatusTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BarracksStatus
     */
    protected $entity;

    public function setUp()
    {
        parent::setUp();

        $factory = new EntityFactory();
        $this->entity = $factory->create('BarracksStatus', [61]);
    }

    public function testGetRaw()
    {
        $this->assertEquals(61, $this->entity->getRaw());
    }

    public function testIsTopRangedDestroyed()
    {
        $this->assertEquals(true, $this->entity->isTopRangedDestroyed());
    }

    public function testIsTopMeleeDestroyed()
    {
        $this->assertEquals(false, $this->entity->isTopMeleeDestroyed());
    }

    public function testIsMiddleRangedDestroyed()
    {
        $this->assertEquals(false, $this->entity->isMiddleRangedDestroyed());
    }

    public function testIsMiddleMeleeDestroyed()
    {
        $this->assertEquals(false, $this->entity->isMiddleMeleeDestroyed());
    }

    public function testIsBottomRangedDestroyed()
    {
        $this->assertEquals(false, $this->entity->isBottomRangedDestroyed());
    }

    public function testIsBottomMeleeDestroyed()
    {
        $this->assertEquals(false, $this->entity->isBottomMeleeDestroyed());
    }

}

