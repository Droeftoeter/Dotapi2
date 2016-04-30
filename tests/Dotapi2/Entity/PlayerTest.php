<?php
namespace Dotapi2\Tests\Entity;

use Dotapi2\Entity\EntityFactory;

class PlayerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Dotapi2\Entity\Player
     */
    protected $entity;


    protected $data;

    public function setUp()
    {
        parent::setUp();

        $entityFactory = new EntityFactory();
        $matchData = json_decode(file_get_contents('./tests/Responses/getMatchHistory.json'), true);
        $this->data = $matchData['result']['matches'][0]['players'][0];
        $this->entity = $entityFactory->create('Player', $this->data);
    }

    public function testGetId()
    {
        $this->assertEquals($this->data['account_id'], $this->entity->getId());
    }

    public function testGetSteamId()
    {
        if (!extension_loaded('gmp')) {
            $this->markTestSkipped('GMP extension not installed.');
        }

        $entityFactory = new EntityFactory();
        $entity = $entityFactory->create('Player', [
            'account_id' => 22785577
        ]);

        $this->assertEquals('76561197983051305', $entity->getSteamId());
    }

    public function testIsAnonymous()
    {
        $this->assertEquals(false, $this->entity->isAnonymous());
    }

    public function testIsAnonymousAnonymous()
    {
        $entityFactory = new EntityFactory();
        $entity = $entityFactory->create('Player', [
            'account_id' => 4294967295
        ]);
        $this->assertEquals(true, $entity->isAnonymous());
    }

}

