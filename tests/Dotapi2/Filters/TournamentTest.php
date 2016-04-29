<?php

use Dotapi2\Filters;

class TournamentTest extends PHPUnit_Framework_TestCase
{

    public function testTournament()
    {
        $filter = new Filters\Tournament(3671);
        $this->assertArraySubset([
            'league_id' => 3671
        ], $filter->toArray());
    }

}
