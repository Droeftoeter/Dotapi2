<?php
namespace Dotapi2\Entity;

/**
 * AbilityUpgrade Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class AbilityUpgrade extends Entity
{

    /**
     * Get the ID of the upgraded ability
     *
     * @return int
     */
    public function getAbilityId()
    {
        return $this->getProperty('ability', 'int');
    }

    /**
     * Get the time of the upgrade
     *
     * @return int
     */
    public function getTime()
    {
        return $this->getProperty('time', 'int');
    }

    /**
     * Get the level of the player when the upgrade was added
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->getProperty('level', 'int');
    }
}

