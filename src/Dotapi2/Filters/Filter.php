<?php
namespace Dotapi2\Filters;

/**
 * Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
abstract class Filter
{

    /**
     * @var array
     */
    protected $options = [];

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Get the options as array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->options;
    }

}
