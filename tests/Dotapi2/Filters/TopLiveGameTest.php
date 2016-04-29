<?php

use Dotapi2\Filters;

class TopLiveGameTest extends PHPUnit_Framework_TestCase
{

    public function testTopLiveGame()
    {
        $filter = new Filters\TopLiveGame(2);
        $this->assertArraySubset([
            'partner' => 2
        ], $filter->toArray());
    }

}
