<?php

class ResponseTest extends PHPUnit_Framework_TestCase
{

    public function testGetHttpClient()
    {
        $httpClient = new \Dotapi2\HttpClients\Guzzle();
        $response = new \Dotapi2\HttpClients\Message\Response('', 200, [], new \Dotapi2\HttpClients\Message\Request(''), $httpClient);
        $this->assertSame($httpClient, $response->getHttpClient());
    }

    public function testGetRequest()
    {
        $request = new \Dotapi2\HttpClients\Message\Request('');
        $response = new \Dotapi2\HttpClients\Message\Response('', 200, [], $request, new \Dotapi2\HttpClients\Guzzle());
        $this->assertSame($request, $response->getRequest());
    }

    public function testGetHeaders()
    {
        $response = new \Dotapi2\HttpClients\Message\Response('', 200, [
            'Authorization' => 'Bearer test',
            'Accept-Language' => 'en-US'
        ], new \Dotapi2\HttpClients\Message\Request(''), new \Dotapi2\HttpClients\Guzzle());

        $this->assertArraySubset([
            'Authorization' => 'Bearer test',
            'Accept-Language' => 'en-US'
        ], $response->getHeaders());
    }

    public function testGetBody()
    {
        $response = new \Dotapi2\HttpClients\Message\Response('<h1>Test</h1>', 200, [], new \Dotapi2\HttpClients\Message\Request(''), new \Dotapi2\HttpClients\Guzzle());

        $this->assertEquals('<h1>Test</h1>', $response->getBody());
    }

    public function testGetResult()
    {
        $response = new \Dotapi2\HttpClients\Message\Response('{"result":[0,1]}', 200, [], new \Dotapi2\HttpClients\Message\Request(''), new \Dotapi2\HttpClients\Guzzle());

        $this->assertArraySubset([
            0,
            1
        ], $response->getResult());
    }

    public function testGetResultEmpty()
    {
        $response = new \Dotapi2\HttpClients\Message\Response('', 200, [], new \Dotapi2\HttpClients\Message\Request(''), new \Dotapi2\HttpClients\Guzzle());

        $this->assertArraySubset([], $response->getResult());
    }

    public function testGetCollection()
    {
        $response = new \Dotapi2\HttpClients\Message\Response('', 200, [], new \Dotapi2\HttpClients\Message\Request(''), new \Dotapi2\HttpClients\Guzzle());

        $this->assertInstanceOf('\Dotapi2\Collection\Collection', $response->getCollection('Collection'));
    }

    public function testGetEntity()
    {
        $response = new \Dotapi2\HttpClients\Message\Response('', 200, [], new \Dotapi2\HttpClients\Message\Request(''), new \Dotapi2\HttpClients\Guzzle());

        $this->assertInstanceOf('\Dotapi2\Entity\Match', $response->getEntity('Match'));
    }

}
