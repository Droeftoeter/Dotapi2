<?php

use Dotapi2\Filters;
use Dotapi2\Exceptions;

class TeamInfoTest extends PHPUnit_Framework_TestCase
{

    public function testTeamInfo()
    {
        $filter = new Filters\TeamInfo(1838315, 4266);
        $this->assertArraySubset([
            'team_id' => 1838315,
            'league_id' => 4266,
        ], $filter->toArray());
    }

}

