<?php
namespace Dotapi2\Filters;

/**
 * AccountId Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class AccountId extends Filter
{

    /**
     * Constructor
     *
     * @param int $accountId
     */
    public function __construct($accountId)
    {
        parent::__construct();

        $this->setAccountId($accountId);
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

