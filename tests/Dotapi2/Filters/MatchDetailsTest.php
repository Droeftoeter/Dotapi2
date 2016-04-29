<?php

use Dotapi2\Filters;

class MatchDetailsTest extends PHPUnit_Framework_TestCase
{

    public function testMatchDetails()
    {
        $filter = new Filters\MatchDetails(2197925777);
        $this->assertArraySubset([
            'match_id' => 2197925777
        ], $filter->toArray());
    }

}
