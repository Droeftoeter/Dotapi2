<?php

use Dotapi2\Filters;
use Dotapi2\Exceptions;

class FantasyPlayerStatsTest extends PHPUnit_Framework_TestCase
{

    public function testFantasyPlayerStats()
    {
        $filter = new Filters\FantasyPlayerStats(4266, 87278757, new \DateTime("2016-04-29T15:30:05-0700"), new \DateTime("2016-04-29T15:30:05-0700"), 2197925777, 4266);
        $this->assertArraySubset([
            'FantasyLeagueID' => 4266,
            'StartTime' => 1461969005,
            'EndTime' => 1461969005,
            'matchid' => 2197925777,
            'SeriesID' => 4266,
            'PlayerAccountID' => 87278757,
        ], $filter->toArray());
    }

}

