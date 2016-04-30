<?php
namespace Dotapi2\Entity;

use DateTime;
use Dotapi2\Types\Teams;

/**
 * DetailedMatch entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class DetailedMatch extends Match
{

    /**
     * {@inheritDoc}
     */
    public static $collectionMapping = [
        'players' => 'DetailedSlot',
        'pick_bans' => 'PickBanSequence',
    ];

    /**
     * {@inheritDoc}
     */
    public static $entityMapping = [
        'tower_status_dire' => 'TowerStatus',
        'tower_status_radiant' => 'TowerStatus',
        'barracks_status_dire' => 'BarracksStatus',
        'barracks_status_radiant' => 'BarracksStatus',
    ];

    /**
     * Get the winning team (Refer to Teams:: for definitions)
     *
     * @return int
     */
    public function getWinningTeam()
    {
        return ($this->getProperty('radiant_win')) ? Teams::Radiant : Teams::Dire;
    }

    /**
     * The length of the match, in seconds since the match began.
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->getProperty('duration', 'int');
    }

    /**
     * The time in seconds since the match began when first-blood occured.
     *
     * @return int
     */
    public function getFirstBlood()
    {
        return $this->getProperty('first_blood_time', 'int');
    }

    /**
     * Get the time the match ended (in UTC)
     *
     * @return DateTime
     */
    public function getEndTime()
    {
        return new DateTime('@' . ($this->getProperty('start_time', 'int') + $this->getProperty('duration', 'int')));
    }

    /**
     * The league that this match was a part of.
     *
     * @return int
     */
    public function getLeagueId()
    {
        return $this->getProperty('leagueid', 'int');
    }

    /**
     * The number of thumbs-up the game has received by users.
     *
     * @return int
     */
    public function getUpVotes()
    {
        return $this->getProperty('positive_votes', 'int');
    }

    /**
     * The number of thumbs-down the game has received by users.
     *
     * @return int
     */
    public function getDownVotes()
    {
        return $this->getProperty('negative_votes', 'int');
    }

    /**
     * The total number of thumbs (either up or down) the game has received by users.
     *
     * @return int
     */
    public function getTotalVotes()
    {
        return ($this->getUpVotes() + $this->getDownVotes());
    }

    /**
     * The server cluster the match was played upon. Used for downloading replays of matches.
     *
     * @return string
     */
    public function getCluster()
    {
        return $this->getProperty('cluster');
    }

    /**
     * Get the game mode
     *
     * @return int
     */
    public function getGameMode()
    {
        return $this->getProperty('game_mode', 'int');
    }

}

