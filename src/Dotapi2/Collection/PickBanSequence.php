<?php
namespace Dotapi2\Collection;

use Dotapi2\Entity\PickBan as PickBanEntity;

/**
 * A sequence of picks and bans.
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
class PickBanSequence extends TeamFilterable
{

    /**
     * {@inheritDoc}
     */
    public static $entityIndex = 'picks_bans';

    /**
     * {@inheritDoc}
     */
    public static $entityType = 'PickBan';

    /**
     * Get all the picks
     *
     * @return Collection
     */
    public function getPicks()
    {
        return $this->filter(function(PickBanEntity $pickBan) {
            if ($pickBan->isPick() === true) {
                return true;
            }

            return false;
        });
    }

    /**
     * Get all the picks
     *
     * @return Collection
     */
    public function getBans()
    {
        return $this->filter(function(PickBanEntity $pickBan) {
            if ($pickBan->isBan() === true) {
                return true;
            }

            return false;
        });
    }

}

