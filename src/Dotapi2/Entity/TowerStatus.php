<?php
namespace Dotapi2\Entity;

/**
 * Tower Status Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class TowerStatus extends Entity
{

    /**
     * @var int
     */
    protected $raw;

    /**
     * Constructor
     *
     * @param array $status
     */
    public function __construct(array $status)
    {

        $this->raw = $status[0];
        parent::__construct($this->convert($status[0]));
    }

    /**
     * Check if the ancient-top tower is destroyed
     *
     * @return bool
     */
    public function isAncientTopDestroyed()
    {
        return !$this->getProperty('ancient_top', 'bool');
    }

    /**
     * Check if the ancient-bottom tower is destroyed
     *
     * @return bool
     */
    public function isAncientBottomDestroyed()
    {
        return !$this->getProperty('ancient_bottom', 'bool');
    }

    /**
     * Check if the Bottom Tier-3 tower is destroyed
     *
     * @return bool
     */
    public function isBottomTier3Destroyed()
    {
        return !$this->getProperty('bottom_tier_3', 'bool');
    }

    /**
     * Check if the Bottom Tier-2 tower is destroyed
     *
     * @return bool
     */
    public function isBottomTier2Destroyed()
    {
        return !$this->getProperty('bottom_tier_2', 'bool');
    }

    /**
     * Check if the Bottom Tier-1 tower is destroyed
     * @return bool
     */
    public function isBottomTier1Destroyed()
    {
        return !$this->getProperty('bottom_tier_1', 'bool');
    }

    /**
     * Check if the Middle Tier-3 tower is destroyed
     *
     * @return bool
     */
    public function isMiddleTier3Destroyed()
    {
        return !$this->getProperty('middle_tier_3', 'bool');
    }

    /**
     * Check if the Middle Tier-2 tower is destroyed
     *
     * @return bool
     */
    public function isMiddleTier2Destroyed()
    {
        return !$this->getProperty('middle_tier_2', 'bool');
    }

    /**
     * Check if the Middle Tier-1 tower is destroyed
     * @return bool
     */
    public function isMiddleTier1Destroyed()
    {
        return !$this->getProperty('middle_tier_1', 'bool');
    }

    /**
     * Check if the Top Tier-3 tower is destroyed
     *
     * @return bool
     */
    public function isTopTier3Destroyed()
    {
        return !$this->getProperty('top_tier_3', 'bool');
    }

    /**
     * Check if the Top Tier-2 tower is destroyed
     *
     * @return bool
     */
    public function isTopTier2Destroyed()
    {
        return !$this->getProperty('top_tier_2', 'bool');
    }

    /**
     * Check if the Top Tier-1 tower is destroyed
     * @return bool
     */
    public function isTopTier1Destroyed()
    {
        return !$this->getProperty('top_tier_1', 'bool');
    }

    /**
     * Get the raw status
     *
     * @return int
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * Convert raw status data into proper status.
     *
     * @param int $status
     *
     * @return int[]
     */
    protected function convert($status)
    {
        $keys = [
            'ancient_top',
            'ancient_bottom',
            'bottom_tier_3',
            'bottom_tier_2',
            'bottom_tier_1',
            'middle_tier_3',
            'middle_tier_2',
            'middle_tier_1',
            'top_tier_3',
            'top_tier_2',
            'top_tier_1'
        ];

        $value = substr(sprintf("%016d", decbin($status)), 5); // First five values are unused
        $arr = str_split($value);
        return array_combine($keys, $arr);
    }

}

