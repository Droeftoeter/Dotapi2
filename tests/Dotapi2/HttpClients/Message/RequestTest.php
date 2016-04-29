<?php

class RequestTest extends PHPUnit_Framework_TestCase
{

    public function testSetParameters()
    {
        $request = new \Dotapi2\HttpClients\Message\Request('');
        $request->setParameters([
            'param1' => 'value',
            'param2' => 'value2'
        ]);

        $this->assertArraySubset([
            'param1' => 'value',
            'param2' => 'value2'
        ], $request->getParameters());
    }

    public function testAddParameter()
    {
        $request = new \Dotapi2\HttpClients\Message\Request('');
        $request->addParameter('param1', 'value');

        $this->assertArraySubset([
            'param1' => 'value'
        ], $request->getParameters());
    }

    public function testSetHeaders()
    {
        $request = new \Dotapi2\HttpClients\Message\Request('');
        $request->setHeaders([
            'Authorization' => 'Bearer test',
            'Accept-Language' => 'en-US'
        ]);

        $this->assertArraySubset([
            'Authorization' => 'Bearer test',
            'Accept-Language' => 'en-US'
        ], $request->getHeaders());
    }

    public function testAddHeader()
    {
        $request = new \Dotapi2\HttpClients\Message\Request('');
        $request->addHeader('Authorization', 'Bearer test');

        $this->assertArraySubset([
            'Authorization' => 'Bearer test'
        ], $request->getHeaders());
    }

}
