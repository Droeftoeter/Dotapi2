<?php
namespace Dotapi2\Filters;

/**
 * Match Details Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class MatchDetails extends Filter
{

    /**
     * Constructor
     *
     * @param string $matchId
     */
    public function __construct($matchId)
    {
        parent::__construct();
        $this->setMatchId($matchId);
    }

    /**
     * The match id
     *
     * @param string|int $matchId
     */
    public function setMatchId($matchId)
    {
        $this->options['match_id'] = (string)$matchId;
    }

}
