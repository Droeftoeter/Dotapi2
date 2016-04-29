<?php
namespace Dotapi2\HttpClients;

use Dotapi2\HttpClients\Message\Request;
use Dotapi2\HttpClients\Message\Response;

/**
 * Performs requests on the DotA 2 API (Steam WebAPI).
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\HttpClients
 */
interface HttpClientInterface {

    /**
     * Send a request
     *
     * @param Request $request
     *
     * @return Response
     */
    public function send(Request $request);

    /**
     * Get the last response
     *
     * @return Response|null
     */
    public function getLastResponse();

    /**
     * Get the last request
     *
     * @return Request|null
     */
    public function getLastRequest();

}
