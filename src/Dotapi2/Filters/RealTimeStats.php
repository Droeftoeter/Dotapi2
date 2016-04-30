<?php
namespace Dotapi2\Filters;

/**
 * Real Time Stats Filter
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Filters
 */
class RealTimeStats extends Filter
{

    /**
     * Constructor.
     *
     * @param int $serverSteamId
     */
    public function __construct($serverSteamId)
    {
        parent::__construct();

        $this->setServerSteamId($serverSteamId);
    }

    /**
     * Server the server steam id
     *
     * @param $serverSteamId
     */
    public function setServerSteamId($serverSteamId)
    {
        $this->options['server_steam_id'] = $serverSteamId;
    }

}

