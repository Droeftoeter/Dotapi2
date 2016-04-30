<?php
namespace Dotapi2\Collection;

use Dotapi2\Entity\Player as PlayerEntity;

/**
 * Player collection
 * Contains a list of Player entities
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
class Player extends Collection
{

    /**
     * {@inheritDoc}
     */
    public static $entityIndex = 'players';

    /**
     * {@inheritDoc}
     */
    public static $entityType = 'Player';

    /**
     * Get a player by ID
     *
     * @param string|int $accountId
     *
     * @return PlayerEntity|null
     */
    public function getById($accountId)
    {
        return $this->filter(function(PlayerEntity $player) use ($accountId) {
            if ($player->getId() === $accountId) {
                return true;
            }

            return false;
        })->first();
    }

}

