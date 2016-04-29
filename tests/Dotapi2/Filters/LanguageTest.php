<?php

use Dotapi2\Filters;
use Dotapi2\Exceptions;

class LanguageTest extends PHPUnit_Framework_TestCase
{

    public function testLanguage()
    {
        $filter = new Filters\Language('en');
        $this->assertArraySubset([
            'language' => 'en'
        ], $filter->toArray());
    }

    public function testSetLanguageException()
    {
        $this->expectException(Exceptions\FilterException::class);
        new Filters\Language('en-GB');
    }

}
