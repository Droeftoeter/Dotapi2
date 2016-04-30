<?php

use Dotapi2\Filters;
use Dotapi2\Exceptions;

class BroadcasterInfoTest extends PHPUnit_Framework_TestCase
{

    public function testLanguage()
    {
        $filter = new Filters\BroadcasterInfo(76561197971273450, 4266);
        $this->assertArraySubset([
            'broadcaster_steam_id' => 76561197971273450,
            'league_id' => 4266
        ], $filter->toArray());
    }

}

