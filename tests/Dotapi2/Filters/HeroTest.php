<?php

use Dotapi2\Filters;

class HeroTest extends PHPUnit_Framework_TestCase
{

    public function testHero()
    {
        $filter = new Filters\Hero('en', true);
        $this->assertArraySubset([
            'language' => 'en',
            'itemizedonly' => true
        ], $filter->toArray());
    }

}
