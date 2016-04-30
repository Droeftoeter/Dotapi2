<?php
namespace Dotapi2\Filters;

/**
 * Event Stats Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class EventStats extends Language
{

    /**
     * Constructor
     *
     * @param string $eventId
     * @param string $accountId
     * @param string $language ISO639-1 language code
     */
    public function __construct($eventId, $accountId, $language = null)
    {
        parent::__construct($language);

        $this->setEventId($eventId);
        $this->setAccountId($accountId);
    }

    /**
     * Set the event id
     *
     * @param int $eventId
     */
    public function setEventId($eventId)
    {
        $this->options['eventid'] = $eventId;
    }

    /**
     * Set the account id
     *
     * @param int $accountId
     */
    public function setAccountId($accountId)
    {
        $this->options['accountid'] = $accountId;
    }

}


