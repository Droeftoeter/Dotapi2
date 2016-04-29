<?php

use Dotapi2\Client;

class ClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Client
     */
    protected $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = new Client();
    }

    public function testSetDefaultKey()
    {
        Client::setDefaultKey('123');
        $client = new Client();
        $this->assertEquals('123', $client->getKey());
    }

}