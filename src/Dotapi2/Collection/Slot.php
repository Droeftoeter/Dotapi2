<?php
namespace Dotapi2\Collection;

/**
 * Slot collection
 * Contains a list of Player entities
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
class Slot extends Collection
{

    /**
     * {@inheritDoc}
     */
    public static $entityIndex = 'players';

    /**
     * {@inheritDoc}
     */
    public static $entityType = 'Slot';

}

