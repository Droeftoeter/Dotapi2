<?php
namespace Dotapi2\Collection;

use Dotapi2\Types\Teams;

/**
 * Collections that are filterable by team
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
abstract class TeamFilterable extends Collection
{

    /**
     * Get by team
     *
     * @param $team
     *
     * @return Collection
     */
    public function getByTeam($team)
    {
        return $this->filter(function($teamEntity) use ($team) {
            if ($teamEntity->getTeam() === $team) {
                return true;
            }

            return false;
        });
    }

    /**
     * Get the dire players
     *
     * @return Collection
     */
    public function getDire()
    {
        return $this->getByTeam(Teams::DIRE);
    }

    /**
     * Get the radiant players
     *
     * @return Collection
     */
    public function getRadiant()
    {
        return $this->getByTeam(Teams::RADIANT);
    }

}

