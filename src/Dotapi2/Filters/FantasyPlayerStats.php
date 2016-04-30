<?php
namespace Dotapi2\Filters;

use DateTime;

/**
 * Fantasy Player Stats Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class FantasyPlayerStats extends Filter
{

    /**
     * Constructor
     *
     * @param int $fantasyLeagueId
     * @param DateTime|int $startTime
     * @param DateTime|int $endTime
     * @param int $matchId
     * @param int $seriesId
     * @param int $accountId
     */
    public function __construct($fantasyLeagueId, $accountId = null, $startTime = null, $endTime = null, $matchId = null, $seriesId = null)
    {
        parent::__construct();

        $this->setFantasyLeagueId($fantasyLeagueId);

        if ($startTime !== null) {
            $this->setStartTime($startTime);
        }

        if ($endTime !== null) {
            $this->setEndTime($endTime);
        }

        if ($matchId !== null) {
            $this->setMatchId($matchId);
        }

        if ($seriesId !== null) {
            $this->setSeriesId($seriesId);
        }

        if ($accountId !== null) {
            $this->setAccountId($accountId);
        }
    }

    /**
     * Set the fantasy league id
     *
     * @param int $fantasyLeagueId
     */
    public function setFantasyLeagueId($fantasyLeagueId)
    {
        $this->options['FantasyLeagueID'] = $fantasyLeagueId;
    }


    /**
     * Set the start time
     *
     * @param DateTime|int $startTime
     */
    public function setStartTime($startTime)
    {
        $this->options['StartTime'] = ($startTime instanceof DateTime) ? $startTime->getTimestamp() : intval($startTime);
    }

    /**
     * Set the end time
     *
     * @param DateTime|int $endTime
     */
    public function setEndTime($endTime)
    {
        $this->options['EndTime'] = ($endTime instanceof DateTime) ? $endTime->getTimestamp() : intval($endTime);
    }

    /**
     * Set the match id
     *
     * @param int $matchId
     */
    public function setMatchId($matchId)
    {
        $this->options['matchid'] = $matchId;
    }

    /**
     * Set the series id
     *
     * @param int $seriesId
     */
    public function setSeriesId($seriesId)
    {
        $this->options['SeriesID'] = $seriesId;
    }

    /**
     * Set the account id
     *
     * @param int $accountId
     */
    public function setAccountId($accountId)
    {
        $this->options['PlayerAccountID'] = $accountId;
    }

}


