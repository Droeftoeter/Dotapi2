<?php
namespace Dotapi2\Entity;

use Dotapi2\Collection\AbilityUpgradeSequence;

/**
 * DetailedSlot Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class DetailedSlot extends Slot
{

    /**
     * {@inheritDoc}
     */
    public static $collectionMapping = [
        'ability_upgrades' => 'AbilityUpgradeSequence'
    ];

    /**
     * Get the ability upgrade sequence
     *
     * @return AbilityUpgradeSequence
     */
    public function getAbilityUpgrades()
    {
        return $this->getProperty('ability_upgrades');
    }

    /**
     * The amount of kills attributed to this player.
     *
     * @return int
     */
    public function getKills()
    {
        return $this->getProperty('kills', 'int');
    }

    /**
     * The amount of times this player died during the match.
     *
     * @return int
     */
    public function getDeaths()
    {
        return $this->getProperty('deaths', 'int');
    }

    /**
     * The amount of assists attributed to this player.
     *
     * @return int
     */
    public function getAssists()
    {
        return $this->getProperty('assists', 'int');
    }

    /**
     * What the values here represent are not yet known.
     *
     * @return int
     */
    public function getLeaverStatus()
    {
        return $this->getProperty('leaver_status');
    }

    /**
     * The amount of gold the player had remaining at the end of the match.
     *
     * @return int
     */
    public function getGold()
    {
        return $this->getProperty('gold', 'int');
    }

    /**
     * The amount of last-hits the player got during the match.
     *
     * @return int
     */
    public function getLastHits()
    {
        return $this->getProperty('last_hits', 'int');
    }

    /**
     * The amount of denies the player got during the match.
     *
     * @return int
     */
    public function getDenies()
    {
        return $this->getProperty('denies', 'int');
    }

    /**
     * The player's overall gold/minute.
     *
     * @return int
     */
    public function getGoldPerMinute()
    {
        return $this->getProperty('gold_per_min', 'int');
    }

    /**
     * The player's overall experience/minute.
     *
     * @return int
     */
    public function getExperiencePerMinute()
    {
        return $this->getProperty('xp_per_min', 'int');
    }

    /**
     * The amount of gold the player spent during the match.
     *
     * @return int
     */
    public function getGoldSpent()
    {
        return $this->getProperty('gold_spent', 'int');
    }

    /**
     * The amount of damage the player dealt to heroes.
     *
     * @return int
     */
    public function getHeroDamage()
    {
        return $this->getProperty('hero_damage', 'int');
    }

    /**
     * The amount of damage the player dealt to towers.
     *
     * @return int
     */
    public function getTowerDamage()
    {
        return $this->getProperty('tower_damage', 'int');
    }

    /**
     * The amount of health the player had healed on heroes.
     *
     * @return int
     */
    public function getHeroHealing()
    {
        return $this->getProperty('hero_healing', 'int');
    }

    /**
     * The player's level at match end.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->getProperty('level', 'int');
    }

    /**
     * Get the players inventory
     *
     * @return int[]
     */
    public function getInventory()
    {
        return [
            $this->getProperty('item_0', 'int'),
            $this->getProperty('item_1', 'int'),
            $this->getProperty('item_2', 'int'),
            $this->getProperty('item_3', 'int'),
            $this->getProperty('item_4', 'int'),
            $this->getProperty('item_5', 'int'),
        ];
    }

}

