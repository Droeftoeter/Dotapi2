<?php
namespace Dotapi2\Filters;

use \DateTime;

/**
 * Scheduled Leagues Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class ScheduledLeagues extends Filter
{

    /**
     * Constructor.
     *
     * @param DateTime|int $from
     * @param DateTime|int $to
     */
    public function __construct($from = null, $to = null)
    {
        parent::__construct();

        if ($from !== null) {
            $this->setFromDate($from);
        }

        if ($to !== null) {
            $this->setToDate($to);
        }
    }

    /**
     * Set the from date
     *
     * @param DateTime|int $ts
     */
    public function setFromDate($ts)
    {
        $this->options['date_min'] = ($ts instanceof DateTime) ? $ts->getTimestamp() : intval($ts);
    }

    /**
     * Set the to date
     *
     * @param DateTime|int $ts
     */
    public function setToDate($ts)
    {
        $this->options['date_max'] = ($ts instanceof DateTime) ? $ts->getTimestamp() : intval($ts);
    }

}
