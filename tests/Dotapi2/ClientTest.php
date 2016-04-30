<?php

use Dotapi2\Client;
use Dotapi2\Exceptions;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class ClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    public function setUp()
    {
        parent::setUp();
        $this->mockHandler = new MockHandler();

        $handler = \GuzzleHttp\HandlerStack::create($this->mockHandler);
        $this->client = new Client(null, new \Dotapi2\HttpClients\Guzzle(['handler' => $handler]));
    }

    public function testSetDefaultKey()
    {
        Client::setDefaultKey('123');
        $client = new Client();
        $this->assertEquals('123', $client->getKey());
    }

    public function testGetMatchHistory()
    {
        $file = file_get_contents('./tests/Responses/getMatchHistory.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getMatchHistory();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetMatchHistoryBySequenceNumber()
    {
        $file = file_get_contents('./tests/Responses/getMatchHistoryBySequenceNumber.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getMatchHistoryBySequenceNumber();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetMatchDetails()
    {
        $file = file_get_contents('./tests/Responses/getMatchDetails.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getMatchDetails(new \Dotapi2\Filters\MatchDetails('2197925777'));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetLeagueListing()
    {
        $file = file_get_contents('./tests/Responses/getLeagueListing.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getLeagueListing();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetLiveLeagueGames()
    {
        $file = file_get_contents('./tests/Responses/getLiveLeagueGames.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getLiveLeagueGames();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetScheduledLeagueGames()
    {
        $file = file_get_contents('./tests/Responses/getScheduledLeagueGames.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getScheduledLeagueGames();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetFantasyPlayerStats()
    {
        $file = file_get_contents('./tests/Responses/getFantasyPlayerStats.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getFantasyPlayerStats(new \Dotapi2\Filters\FantasyPlayerStats(4266, null, null, null, null, 87278757));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetPlayerOfficialInfo()
    {
        $file = file_get_contents('./tests/Responses/getPlayerOfficialInfo.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getPlayerOfficialInfo(new \Dotapi2\Filters\AccountId(87278757));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetBroadcasterInfo()
    {
        $file = file_get_contents('./tests/Responses/getBroadcasterInfo.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getBroadcasterInfo(new \Dotapi2\Filters\BroadcasterInfo(76561197971273450));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetTestActiveTournamentList()
    {
        $file = file_get_contents('./tests/Responses/getActiveTournamentList.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getActiveTournamentList();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetTeamInfo()
    {
        $file = file_get_contents('./tests/Responses/getTeamInfo.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getTeamInfo(new \Dotapi2\Filters\TeamInfo(1838315));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetTopLiveGame()
    {
        $file = file_get_contents('./tests/Responses/getTopLiveGame.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getTopLiveGame(new \Dotapi2\Filters\TopLiveGame(0));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetEventStatsForAccount()
    {
        $file = file_get_contents('./tests/Responses/getEventStatsForAccount.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getEventStatsForAccount(new \Dotapi2\Filters\EventStats(4266, 22785577));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetRealTimeStats()
    {
        $file = file_get_contents('./tests/Responses/getRealTimeStats.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getRealTimeStats(new \Dotapi2\Filters\RealTimeStats(90101107122956292));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetGameItems()
    {
        $file = file_get_contents('./tests/Responses/getGameItems.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getGameItems();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetItemIconPath()
    {
        $file = file_get_contents('./tests/Responses/getItemIconPath.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getItemIconPath(new \Dotapi2\Filters\ItemIconPath('enchanted_manglewood_staff'));
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetSchemaUrl()
    {
        $file = file_get_contents('./tests/Responses/getSchemaUrl.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getSchemaUrl();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetHeroes()
    {
        $file = file_get_contents('./tests/Responses/getHeroes.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getHeroes();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetRarities()
    {
        $file = file_get_contents('./tests/Responses/getRarities.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getRarities();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

    public function testGetTournamentPrizePool()
    {
        $file = file_get_contents('./tests/Responses/getTournamentPrizePool.json');
        $this->mockHandler->append(new Response('200', [], $file));

        $response = $this->client->getTournamentPrizePool();
        $this->assertArraySubset(json_decode($file, true), $response->getJson());
    }

}
