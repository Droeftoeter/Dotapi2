<?php

use Dotapi2\Filters;

class MatchTest extends PHPUnit_Framework_TestCase
{

    public function testSetHeroId()
    {
        $filter = new Filters\Match();
        $filter->setHeroId(321);
        $this->assertArraySubset([
            'hero_id' => 321
        ], $filter->toArray());
    }

    public function testSetGameMode()
    {
        $filter = new Filters\Match();
        $filter->setGameMode(\Dotapi2\Types\GameModes::ALL_RANDOM);
        $this->assertArraySubset([
            'game_mode' => \Dotapi2\Types\GameModes::ALL_RANDOM
        ], $filter->toArray());
    }

    public function testSetSkillBracket()
    {
        $filter = new Filters\Match();
        $filter->setSkillBracket(\Dotapi2\Types\SkillBracket::HIGH);
        $this->assertArraySubset([
            'skill' => \Dotapi2\Types\SkillBracket::HIGH
        ], $filter->toArray());
    }

    public function testSetFromDateTimestamp()
    {
        $filter = new Filters\Match();
        $filter->setFromDate(1461969005);
        $this->assertArraySubset([
            'date_min' => 1461969005
        ], $filter->toArray());
    }

    public function testSetFromDateDateTime()
    {
        $filter = new Filters\Match();
        $filter->setFromDate(new \DateTime("2016-04-29T15:30:05-0700"));
        $this->assertArraySubset([
            'date_min' => 1461969005
        ], $filter->toArray());
    }

    public function testSetToDateTimestamp()
    {
        $filter = new Filters\Match();
        $filter->setToDate(1461969005);
        $this->assertArraySubset([
            'date_max' => 1461969005
        ], $filter->toArray());
    }

    public function testSetToDateDateTime()
    {
        $filter = new Filters\Match();
        $filter->setToDate(new \DateTime("2016-04-29T15:30:05-0700"));
        $this->assertArraySubset([
            'date_max' => 1461969005
        ], $filter->toArray());
    }

    public function testSetMinimumPlayers()
    {
        $filter = new Filters\Match();
        $filter->setMinimumPlayers(2);
        $this->assertArraySubset([
            'min_players' => 2
        ], $filter->toArray());
    }

    public function testSetAccountId()
    {
        $filter = new Filters\Match();
        $filter->setAccountId(22785577);
        $this->assertArraySubset([
            'account_id' => 22785577
        ], $filter->toArray());
    }

    public function testSetLeagueId()
    {
        $filter = new Filters\Match();
        $filter->setLeagueId(3671);
        $this->assertArraySubset([
            'league_id' => 3671
        ], $filter->toArray());
    }

    public function testStartAtMatchId()
    {
        $filter = new Filters\Match();
        $filter->startAtMatchId(2197925777);
        $this->assertArraySubset([
            'start_at_match_id' => 2197925777
        ], $filter->toArray());
    }

    public function testSetLimit()
    {
        $filter = new Filters\Match();
        $filter->setLimit(4);
        $this->assertArraySubset([
            'matches_requested' => 4
        ], $filter->toArray());
    }

    public function testSetOnlyTournamentGames()
    {
        $filter = new Filters\Match();
        $filter->setOnlyTournamentGames(true);
        $this->assertArraySubset([
            'tournament_games_only' => 'true'
        ], $filter->toArray());
    }

}
