<?php
namespace Dotapi2\Filters;

/**
 * BroadcasterInfo Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class BroadcasterInfo extends Filter
{

    /**
     * Constructor
     *
     * @param int $broadcasterSteamId
     * @param int $leagueId
     */
    public function __construct($broadcasterSteamId, $leagueId = null)
    {
        parent::__construct();

        $this->setBroadcasterSteamId($broadcasterSteamId);

        if ($leagueId !== null) {
            $this->setLeagueId($leagueId);
        }
    }

    /**
     * Set the 64-bit broadcaster steam id
     *
     * @param int $broadcasterSteamId
     */
    public function setBroadcasterSteamId($broadcasterSteamId)
    {
        $this->options['broadcaster_steam_id'] = $broadcasterSteamId;
    }

    /**
     * Set the league id
     *
     * @param int $leagueId
     */
    public function setLeagueId($leagueId)
    {
        $this->options['league_id'] = $leagueId;
    }

}

