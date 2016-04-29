<?php
namespace Dotapi2\Filters;

/**
 * Tournament
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class Tournament extends Filter
{

    /**
     * Constructor.
     *
     * @param string $leagueId
     */
    public function __construct($leagueId = null)
    {
        parent::__construct();

        if ($leagueId !== null) {
            $this->setLeagueId($leagueId);
        }
    }

    /**
     * Set the league id.
     *
     * @param string $leagueId
     */
    public function setLeagueId($leagueId)
    {
        $this->options['league_id'] = $leagueId;
    }

}
