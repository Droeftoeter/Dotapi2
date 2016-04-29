<?php
namespace Dotapi2\Filters;

/**
 * Match Sequence Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class MatchSequence extends Filter
{

    /**
     * Constructor.
     *
     * @param string|int|null $start
     * @param int|null $limit
     */
    public function __construct($start = null, $limit = null)
    {
        parent::__construct();

        if ($start !== null) {
           $this->setStartSequenceNumber($start);
        }

        if ($limit !== null) {
            $this->setLimit($limit);
        }
    }

    /**
     * The match sequence number to start returning results from.
     *
     * @param string|int $start
     */
    public function setStartSequenceNumber($start)
    {
        $this->options['start_at_match_seq_num'] = (string)$start;
    }

    /**
     * Set the amount of matches to return
     *
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->options['matches_requested'] = intval($limit);
    }

}
