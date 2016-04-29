<?php
namespace Dotapi2;

use Dotapi2\Filters;
use Dotapi2\HttpClients\Guzzle;
use Dotapi2\HttpClients\HttpClientInterface;
use Dotapi2\HttpClients\Message\Request;
use Dotapi2\HttpClients\Message\Response;
use Dotapi2\Exceptions\EndpointNotImplementedException;

/**
 * Dotapi2 Client
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2
 */
class Client
{

    /**
     * DotA 2 Steam API App ID
     */
    const DOTA2_APP_ID = 570;

    /**
     * DotA 2 WebAPI base URL
     */
    const DOTA2_API_BASE_URL = 'https://api.steampowered.com/';

    /**
     * @var string default Steam API key to use ( get one at http://steamcommunity.com/dev/apikey )
     */
    protected static $defaultKey = '';

    /**
     * @var string Steam API key
     */
    protected $key;

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * Set the default Steam API key to use in request
     *
     * @param string $key
     */
    public static function setDefaultKey($key)
    {
        self::$defaultKey = $key;
    }

    /**
     * Constructor
     *
     * @param string $key Steam API key to use
     * @param HttpClientInterface $httpClient
     */
    public function __construct($key = null, HttpClientInterface $httpClient = null)
    {
        $this->key = (is_null($key)) ? self::$defaultKey : $key;
        $this->httpClient = ($httpClient instanceof HttpClientInterface) ? $httpClient : new Guzzle(); // Guzzle is the default client
    }

    /**
     * Get match history
     *
     * @param Filters\Match $filter

     * @return Response
     */
    public function getMatchHistory(Filters\Match $filter = null)
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetMatchHistory/v1', $filter);
    }

    /**
     * Get a list of matches ordered by sequence number
     *
     * @param Filters\MatchSequence $filter
     *
     * @return Response
     */
    public function getMatchHistoryBySequenceNumber(Filters\MatchSequence $filter = null)
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetMatchHistoryBySequenceNum/v1', $filter);
    }

    /**
     * Get information about a particular match
     *
     * @param Filters\MatchDetails $filter
     *
     * @return Response
     */
    public function getMatchDetails(Filters\MatchDetails $filter)
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetMatchDetails/v1', $filter);
    }

    /**
     * Get information about DotaTV-supported leagues.
     *
     * @param Filters\Language $filter
     *
     * @return Response
     */
    public function getLeagueListing(Filters\Language $filter = null)
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetLeagueListing/v1', $filter);
    }

    /**
     * Get a list of in-progress league matches, as well as details of that match as it unfolds.
     *
     * @return Response
     */
    public function getLiveLeagueGames()
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetLiveLeagueGames/v1');
    }

    /**
     * Get a list of scheduled league games coming up.
     *
     * @param Filters\ScheduledLeagues $filter
     *
     * @return Response
     */
    public function getScheduledLeagueGames(Filters\ScheduledLeagues $filter = null)
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetScheduledLeagueGames/v1', $filter);
    }

    /**
     * Get stats about a particular player within a tournament.
     *
     * @param Filters\TournamentPlayer $filter
     *
     * @return Response
     */
    public function getTournamentPlayerStats(Filters\TournamentPlayer $filter)
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetTournamentPlayerStats/v1', $filter);
    }

    /**
     * @throws EndpointNotImplementedException
     * @todo Implement
     */
    public function getFantasyPlayerStats()
    {
        throw new EndpointNotImplementedException();
    }

    /**
     * @throws EndpointNotImplementedException
     * @todo Implement
     */
    public function getPlayerOfficialInfo()
    {
        throw new EndpointNotImplementedException();
    }

    /**
     * @throws EndpointNotImplementedException
     * @todo Implement
     */
    public function getBroadcasterInfo()
    {
        throw new EndpointNotImplementedException();
    }

    /**
     * @throws EndpointNotImplementedException
     * @todo Implement
     */
    public function getActiveTournamentList()
    {
        throw new EndpointNotImplementedException();
    }

    /**
     * @throws EndpointNotImplementedException
     * @todo Implement
     */
    public function getTeamInfo()
    {
        throw new EndpointNotImplementedException();
    }

    /**
     * Get the top live games.
     *
     * @param Filters\TopLiveGame $filter
     *
     * @return Response
     */
    public function getTopLiveGame(Filters\TopLiveGame $filter)
    {
        return $this->get('IDOTA2Match_' . self::DOTA2_APP_ID . '/GetTopLiveGame/v1', $filter);
    }

    /**
     * @throws EndpointNotImplementedException
     * @todo Implement
     */
    public function getEventStatsForAccount()
    {
        throw new EndpointNotImplementedException();
    }

    /**
     * @throws EndpointNotImplementedException
     * @todo Implement
     */
    public function getRealTimeStats()
    {
        throw new EndpointNotImplementedException();
    }

    /**
     * Get a list of Dota2 in-game items.
     *
     * @param Filters\Language $filter
     *
     * @return Response
     */
    public function getGameItems(Filters\Language $filter = null)
    {
        return $this->get('IEconDOTA2_' . self::DOTA2_APP_ID . '/GetGameItems/v1', $filter);
    }

    /**
     * Get the CDN path for a specific icon.
     *
     * @param Filters\ItemIconPath $filter
     *
     * @return Response
     */
    public function getItemIconPath(Filters\ItemIconPath $filter)
    {
        return $this->get('IEconDOTA2_' . self::DOTA2_APP_ID . '/GetItemIconPath/v1', $filter);
    }

    /**
     * Get a list of heroes.
     *
     * @param Filters\Hero $filter
     *
     * @return Response
     */
    public function getHeroes(Filters\Hero $filter = null)
    {
        return $this->get('IEconDOTA2_' . self::DOTA2_APP_ID . '/GetHeroes/v1', $filter);
    }

    /**
     * Get item rarity list.
     *
     * @param Filters\Language $filter
     *
     * @return Response
     */
    public function getRarities(Filters\Language $filter = null)
    {
        return $this->get('IEconDOTA2_' . self::DOTA2_APP_ID . '/GetRarities/v1', $filter);
    }

    /**
     * Get the current pricepool for specific tournaments.
     *
     * @param Filters\Tournament $filter
     *
     * @return Response
     */
    public function getTournamentPrizePool(Filters\Tournament $filter = null)
    {
        return $this->get('IEconDOTA2_' . self::DOTA2_APP_ID . '/GetTournamentPrizePool/v1', $filter);
    }

    /**
     * Get data from an endpoint
     *
     * @param string $uri
     * @param array|Filters\Filter $parameters
     *
     * @return Response
     */
    public function get($uri, $parameters = [])
    {
        if($parameters instanceof Filters\Filter) {
            $parameters = $parameters->toArray();
        }

        return $this->getHttpClient()->send($this->createRequest($uri, $parameters));
    }

    /**
     * Get the Steam API key used for requests
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the Http client
     *
     * @return HttpClientInterface
     */
    protected function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Create a new request
     *
     * @param string $url
     * @param array $parameters
     * @param string $method
     *
     * @return Request
     */
    protected function createRequest($url, array $parameters = [], $method = 'GET')
    {
        $parameters = array_merge([
            'key'   => $this->getKey()
        ], $parameters);
        return new Request(self::DOTA2_API_BASE_URL . $url, $method, $parameters);
    }

}
