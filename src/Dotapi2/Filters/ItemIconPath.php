<?php
namespace Dotapi2\Filters;

use Dotapi2\Types\IconType;

/**
 * Language Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class ItemIconPath extends Filter
{

    /**
     * Constructor
     *
     * @param string $iconName
     * @param int $iconType
     */
    public function __construct($iconName, $iconType = IconType::Normal)
    {
        parent::__construct();
        $this->setIconName($iconName);
        $this->setIconType($iconType);
    }

    /**
     * Set the icon name.
     *
     * @param string $iconName
     */
    public function setIconName($iconName)
    {
        $this->options['iconname'] = $iconName;
    }

    /**
     * Set the icon type.
     *
     * @param int $iconType
     */
    public function setIconType($iconType)
    {
        $this->options['icontype'] = intval($iconType);
    }

}
