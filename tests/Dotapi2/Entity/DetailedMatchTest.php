<?php
namespace Dotapi2\Tests\Entity;

class DetailedMatchTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Dotapi2\Entity\DetailedMatch
     */
    protected $entity;

    protected $data;

    public function setUp()
    {
        parent::setUp();

        $entityFactory = new \Dotapi2\Entity\EntityFactory();
        $matchData = json_decode(file_get_contents('./tests/Responses/getMatchDetails.json'), true);
        $this->data = $matchData['result'];
        $this->entity = $entityFactory->create('DetailedMatch', $this->data);
    }

    public function testGetWinningTeam()
    {
        $this->assertEquals($this->data['radiant_win'] ? 0 : 1, $this->entity->getWinningTeam());
    }

    public function testGetDuration()
    {
        $this->assertEquals($this->data['duration'], $this->entity->getDuration());
    }

    public function testGetFirstBlood()
    {
        $this->assertEquals($this->data['first_blood_time'], $this->entity->getFirstBlood());
    }

    public function testGetEndTime()
    {
        $this->assertEquals($this->data['start_time'] + $this->data['duration'], $this->entity->getEndTime()->getTimestamp());
    }

    public function testGetLeagueId()
    {
        $this->assertEquals($this->data['leagueid'], $this->entity->getLeagueId());
    }

    public function testGetUpVotes()
    {
        $this->assertEquals($this->data['positive_votes'], $this->entity->getUpVotes());
    }

    public function testGetDownVotes()
    {
        $this->assertEquals($this->data['negative_votes'], $this->entity->getDownVotes());
    }

    public function testGetTotalVotes()
    {
        $this->assertEquals($this->data['positive_votes'] + $this->data['negative_votes'], $this->entity->getTotalVotes());
    }

    public function testGetCluster()
    {
        $this->assertEquals($this->data['cluster'], $this->entity->getCluster());
    }

    public function testGetGameMode()
    {
        $this->assertEquals($this->data['game_mode'], $this->entity->getGameMode());
    }

}

