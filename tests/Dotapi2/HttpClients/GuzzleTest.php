<?php

use Dotapi2\HttpClients;
use Dotapi2\Exceptions;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class GuzzleTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var HttpClients\Guzzle
     */
    protected $client;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    public function setUp()
    {
        parent::setUp();
        $this->mockHandler = new MockHandler();

        $handler = \GuzzleHttp\HandlerStack::create($this->mockHandler);
        $this->client = new HttpClients\Guzzle(['handler' => $handler]);
    }

    public function testSend()
    {
        $this->mockHandler->append(new Response('200'));
        $response = $this->client->send(new HttpClients\Message\Request(''));
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testSendInvalidKey()
    {
        $this->expectException(Exceptions\InvalidKeyException::class);
        $this->mockHandler->append(new Response('403'));
        $this->client->send(new HttpClients\Message\Request(''));
    }

    public function testSendClientException()
    {
        $this->expectException(Exceptions\RequestException::class);
        $this->mockHandler->append(new Response('404'));
        $this->client->send(new HttpClients\Message\Request(''));
    }

    public function testSendException()
    {
        $this->expectException(Exceptions\RequestException::class);
        $this->mockHandler->append(new Response('500'));
        $this->client->send(new HttpClients\Message\Request(''));
    }

    public function testSendUnavailableException()
    {
        $this->expectException(Exceptions\RequestException::class);
        $this->mockHandler->append(new Response('503'));
        $this->client->send(new HttpClients\Message\Request(''));
    }

    public function testGetLastResponse()
    {
        $this->mockHandler->append(new Response('200'));
        $response = $this->client->send(new HttpClients\Message\Request(''));
        $this->assertSame($response, $this->client->getLastResponse());
    }

    public function testGetLastRequest()
    {
        $request = new HttpClients\Message\Request('');
        $this->mockHandler->append(new Response('200'));
        $this->client->send($request);
        $this->assertSame($request, $this->client->getLastRequest());
    }

}
