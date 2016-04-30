<?php
namespace Dotapi2\Collection;

/**
 * A sequence of picks and bans.
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
class PickBanSequence extends Collection
{

    /**
     * {@inheritDoc}
     */
    public static $entityIndex = 'pick_bans';

    /**
     * {@inheritDoc}
     */
    public static $entityType = 'PickBan';

}

