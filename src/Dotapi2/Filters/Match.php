<?php
namespace Dotapi2\Filters;

use \DateTime;

/**
 * Match Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class Match extends Filter
{

    /**
     * Set the hero id to filter matches by
     *
     * @param int $heroId
     */
    public function setHeroId($heroId)
    {
        $this->options['hero_id'] = intval($heroId);
    }

    /**
     * Set the gamemode to filter matches by
     *
     * @param int $gameMode
     */
    public function setGameMode($gameMode)
    {
        $this->options['game_mode'] = intval($gameMode);
    }

    /**
     * Set the skill bracket
     *
     * @param int $skillBracket
     */
    public function setSkillBracket($skillBracket)
    {
        $this->options['skill'] = intval($skillBracket);
    }

    /**
     * Set the from date
     *
     * @param DateTime|int $ts
     */
    public function setFromDate($ts)
    {
        $this->options['date_min'] = ($ts instanceof DateTime) ? $ts->getTimestamp() : intval($ts);
    }

    /**
     * Set the to date
     *
     * @param DateTime|int $ts
     */
    public function setToDate($ts)
    {
        $this->options['date_max'] = ($ts instanceof DateTime) ? $ts->getTimestamp() : intval($ts);
    }

    /**
     * Set the minimum players
     *
     * @param int $min
     */
    public function setMinimumPlayers($min)
    {
        $this->options['min_players'] = intval($min);
    }

    /**
     * Set the account. Either a DotA 2 ID or Steam ID
     *
     * @param int $accountId
     */
    public function setAccountId($accountId)
    {
        $this->options['account_id'] = intval($accountId);
    }

    /**
     * Set the league ID
     *
     * @param int $leagueId
     */
    public function setLeagueId($leagueId)
    {
        $this->options['league_id'] = intval($leagueId);
    }

    /**
     * Set the starting match id
     *
     * @param int $matchId
     */
    public function startAtMatchId($matchId)
    {
        $this->options['start_at_match_id'] = intval($matchId);
    }

    /**
     * Set the amount of matches to return
     *
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->options['matches_requested'] = intval($limit);
    }

    /**
     * Set if we should only fetch tournament games
     *
     * @param bool $only
     */
    public function setOnlyTournamentGames($only)
    {
        $this->options['tournament_games_only'] = ($only) ? 'true' : 'false';
    }

}
