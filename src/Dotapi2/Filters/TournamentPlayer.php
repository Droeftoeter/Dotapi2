<?php
namespace Dotapi2\Filters;

use \DateTime;

/**
 * Tournament Player Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class TournamentPlayer extends Filter
{

    /**
     * Constructor.
     *
     * @param string $accountId
     * @param string $leagueId
     * @param string $heroId
     */
    public function __construct($accountId, $leagueId = '65006', $heroId = null)
    {
        parent::__construct();

        $this->setAccountId($accountId);

        if ($leagueId !== null) {
            $this->setLeagueId($leagueId);
        }

        if ($heroId !== null) {
            $this->setHeroId($heroId);
        }
    }

    /**
     * Sets the account id
     *
     * @param string $accountId
     */
    public function setAccountId($accountId)
    {
        $this->options['account_id'] = $accountId;
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

    /**
     * Sets the hero id.
     *
     * @param string $heroId
     */
    public function setHeroId($heroId)
    {
        $this->options['hero_id'] = $heroId;
    }

}
