<?php
namespace Dotapi2\Entity;

use DateTime;
use Dotapi2\Collection\DetailedSlot;
use Dotapi2\Collection\PickBanSequence;
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
        'picks_bans' => 'PickBanSequence',
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
     * Get the players
     *
     * @return DetailedSlot
     */
    public function getPlayers()
    {
        return $this->getProperty('players');
    }

    /**
     * Get the picks and bans made in this match
     *
     * @return PickBanSequence
     */
    public function getPicksBans()
    {
        return $this->getProperty('picks_bans');
    }

    /**
     * Get the Dire tower status
     *
     * @return TowerStatus
     */
    public function getDireTowerStatus()
    {
        return $this->getProperty('tower_status_dire');
    }

    /**
     * Get the Radiant tower status
     *
     * @return TowerStatus
     */
    public function getRadiantTowerStatus()
    {
        return $this->getProperty('tower_status_radiant');
    }

    /**
     * Get the Dire barracks status
     *
     * @return BarracksStatus
     */
    public function getDireBarracksStatus()
    {
        return $this->getProperty('barracks_status_dire');
    }

    /**
     * Get the Radiant barracks status
     *
     * @return BarracksStatus
     */
    public function getRadiantBarracksStatus()
    {
        return $this->getProperty('barracks_status_radiant');
    }

    /**
     * Get the winning team (Refer to Teams:: for definitions)
     *
     * @return int
     */
    public function getWinningTeam()
    {
        return ($this->getProperty('radiant_win')) ? Teams::RADIANT : Teams::DIRE;
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

