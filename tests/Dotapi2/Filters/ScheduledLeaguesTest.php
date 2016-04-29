<?php

use Dotapi2\Filters;

class ScheduledLeaguesTest extends PHPUnit_Framework_TestCase
{

    public function testTimestamp()
    {
        $filter = new Filters\ScheduledLeagues(1461969005, 1461969005);
        $this->assertArraySubset([
            'date_min' => 1461969005,
            'date_max' => 1461969005
        ], $filter->toArray());
    }

    public function testDateTime()
    {
        $filter = new Filters\ScheduledLeagues(new \DateTime("2016-04-29T15:30:05-0700"), new \DateTime("2016-04-29T15:30:05-0700"));
        $this->assertArraySubset([
            'date_min' => 1461969005,
            'date_max' => 1461969005
        ], $filter->toArray());
    }

}
