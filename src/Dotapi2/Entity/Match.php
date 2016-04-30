<?php
namespace Dotapi2\Entity;

use DateTime;
use Dotapi2\Collection\Player as PlayerCollection;

/**
 * Match entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class Match extends Entity
{

    /**
     * {@inheritDoc}
     */
    public static $collectionMapping = [
        'players' => 'Slot'
    ];

    /**
     * The matches unique ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->getProperty('match_id', 'int');
    }

    /**
     * Get the players who played in this game
     *
     * @return PlayerCollection
     */
    public function getPlayers()
    {
        return $this->getProperty('players');
    }

    /**
     * A 'sequence number', representing the order in which matches were recorded.
     *
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->getProperty('match_seq_num', 'int');
    }

    /**
     * Get the time the match started (in UTC)
     *
     * @return DateTime
     */
    public function getStartTime()
    {
        return new DateTime('@' . $this->getProperty('start_time', 'int'));
    }

    /**
     * Get the lobby type
     *
     * @return int
     */
    public function getLobbyType()
    {
        return $this->getProperty('lobby_type', 'int');
    }

}

