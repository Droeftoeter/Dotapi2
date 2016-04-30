<?php
namespace Dotapi2\Entity;

use Dotapi2\Util\UserId;
use Dotapi2\Exceptions\Exception;

/**
 * Player Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class Player extends Entity
{

    /**
     * @const int The ID that marks a player as anonymous.
     */
    const Anonymous = 4294967295;

    /**
     * Get the 32-bit Dota 2 account id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getProperty('account_id', 'int');
    }

    /**
     * Gets the 64-bits Steam ID
     *
     * @return string
     *
     * @throws Exception
     */
    public function getSteamId()
    {
        return UserId::to64Bit($this->getId());
    }

    /**
     * Check if the player is anonymous
     *
     * @return bool
     */
    public function isAnonymous()
    {
        return ($this->getId() == self::Anonymous);
    }

}

