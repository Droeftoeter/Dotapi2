<?php
namespace Dotapi2\Filters;

use Dotapi2\Exceptions\FilterException;

/**
 * Language Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class Language extends Filter
{

    /**
     * Constructor
     *
     * @param string $language ISO639-1 language code
     */
    public function __construct($language)
    {
        parent::__construct();
        if ($language !== null) {
            $this->setLanguage($language);
        }
    }

    /**
     * Set the language to fetch results for. Empty or unknown language returns english.
     *
     * @param $language
     *
     * @throws FilterException
     */
    public function setLanguage($language)
    {
        if (strlen($language) > 2) {
            throw new FilterException("Language should be a valid ISO639-1 code.");
        }
        $this->options['language'] = $language;
    }

}
