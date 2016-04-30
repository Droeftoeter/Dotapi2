<?php
namespace Dotapi2\Collection;

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

}

