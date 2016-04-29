<?php
namespace Dotapi2\Filters;

/**
 * Top Live Game Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class TopLiveGame extends Filter
{

    /**
     * Constructor.
     *
     * @param int $partnerId
     */
    public function __construct($partnerId = 0)
    {
        parent::__construct();

        $this->setPartnerId($partnerId);
    }

    /**
     * Set the partner ID.
     *
     * @param int $partnerId
     */
    public function setPartnerId($partnerId)
    {
        $this->options['partner'] = intval($partnerId);
    }
}
