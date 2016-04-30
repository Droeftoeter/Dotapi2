<?php
namespace Dotapi2\Entity;

/**
 * Slot Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class Slot extends Player
{

    /**
     * Constructor
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        // Fix slot
        if (isset($properties['player_slot'])) {
            $binary = sprintf("%08d", decbin($properties['player_slot']));
            $properties['team'] = intval(substr($binary, 0, 1));
            $properties['slot'] = intval(bindec(substr($binary, 1)));
        }

        parent::__construct($properties);
    }

    /**
     * The hero's unique ID.
     *
     * @return int
     */
    public function getHeroId()
    {
        return $this->getProperty('hero_id', 'int');
    }

    /**
     * Get the team
     *
     * @return int
     */
    public function getTeam()
    {
        return $this->getProperty('team', 'int');
    }

    /**
     * Get the slot (1-4)
     *
     * @return int
     */
    public function getSlot()
    {
        return $this->getProperty('slot', 'int');
    }
}

