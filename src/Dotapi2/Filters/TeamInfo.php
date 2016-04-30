<?php
namespace Dotapi2\Filters;

/**
 * Team Info Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class TeamInfo extends Filter
{

    /**
     * Constructor
     *
     * @param int $teamId
     * @param int $leagueId
     */
    public function __construct($teamId = null, $leagueId = null)
    {
        parent::__construct();

        if ($teamId !== null) {
            $this->setTeamId($teamId);
        }

        if ($leagueId !== null) {
            $this->setLeagueId($leagueId);
        }
    }

    /**
     * Set the team id
     *
     * @param int $teamId
     */
    public function setTeamId($teamId)
    {
        $this->options['team_id'] = $teamId;
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

