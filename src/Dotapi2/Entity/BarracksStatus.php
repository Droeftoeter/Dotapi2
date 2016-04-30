<?php
namespace Dotapi2\Entity;

/**
 * Barracks Status Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entity
 */
class BarracksStatus extends Entity
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
     * Check if the top ranged barracks is destroyed
     *
     * @return bool
     */
    public function isTopRangedDestroyed()
    {
        return !$this->getProperty('top_ranged', 'bool');
    }

    /**
     * Check if the top melee barracks is destroyed
     *
     * @return bool
     */
    public function isTopMeleeDestroyed()
    {
        return !$this->getProperty('top_melee', 'bool');
    }

    /**
     * Check if the middle ranged barracks is destroyed
     *
     * @return bool
     */
    public function isMiddleRangedDestroyed()
    {
        return !$this->getProperty('middle_ranged', 'bool');
    }

    /**
     * Check if the middle melee barracks is destroyed
     *
     * @return bool
     */
    public function isMiddleMeleeDestroyed()
    {
        return !$this->getProperty('middle_melee', 'bool');
    }

    /**
     * Check if the bottom ranged barracks is destroyed
     *
     * @return bool
     */
    public function isBottomRangedDestroyed()
    {
        return !$this->getProperty('bottom_ranged', 'bool');
    }

    /**
     * Check if the bottom melee barracks is destroyed
     *
     * @return bool
     */
    public function isBottomMeleeDestroyed()
    {
        return !$this->getProperty('bottom_melee', 'bool');
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
            'bottom_ranged',
            'bottom_melee',
            'middle_ranged',
            'middle_melee',
            'top_ranged',
            'top_melee'
        ];

        $value = substr(sprintf("%08d", decbin($status)), 2); // First two values are unused
        $arr = str_split($value);
        return array_combine($keys, $arr);
    }

}

