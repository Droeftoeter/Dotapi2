<?php
namespace Dotapi2\Entity;

/**
 * PickBan Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class PickBan extends Entity
{

    /**
     * Get the team this pick/ban was for
     *
     * @return int
     */
    public function getTeam()
    {
        return $this->getProperty('team', 'int');
    }

    /**
     * Get the picked/banned hero id
     *
     * @return int
     */
    public function getHeroId()
    {
        return $this->getProperty('hero_id', 'int');
    }

    /**
     * Check if this is a pick
     *
     * @return bool
     */
    public function isPick()
    {
        return ($this->getProperty('is_pick'));
    }

    /**
     * Check if this is a ban
     *
     * @return bool
     */
    public function isBan()
    {
        return (!$this->getProperty('is_pick'));
    }

}

