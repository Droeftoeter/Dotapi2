<?php
namespace Dotapi2\Exceptions;

use Exception;

/**
 * EndpointNotImplementedException
 *
 * This exception is thrown when an endpoint is not yet implemented in the Dotapi2 library.
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Exceptions
 */
class EndpointNotImplementedException extends Exception
{

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct('Not implemented yet.');
    }

}

