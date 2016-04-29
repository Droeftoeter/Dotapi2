<?php
namespace Dotapi2\Filters;

/**
 * Hero Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class Hero extends Language
{

    /**
     * Constructor
     *
     * @param string $language ISO639-1 language code
     * @param bool $onlyItemized
     */
    public function __construct($language = null, $onlyItemized = null)
    {
        if ($language !== null) {
            $this->setLanguage($language);
        }

        if ($onlyItemized !== null) {
            $this->setOnlyItemized($onlyItemized);
        }
    }

    /**
     * Set only itemized
     *
     * @param bool $onlyItemized
     */
    public function setOnlyItemized($onlyItemized)
    {
        $this->options['itemizedonly'] = (bool)$onlyItemized;
    }

}
