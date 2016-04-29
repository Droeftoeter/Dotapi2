<?php

use Dotapi2\Filters;

class MatchSequenceTest extends PHPUnit_Framework_TestCase
{

    public function testMatchSequence()
    {
        $filter = new Filters\MatchSequence('3453453', 10);
        $this->assertArraySubset([
            'start_at_match_seq_num' => '3453453',
            'matches_requested' => 10
        ], $filter->toArray());
    }

}
