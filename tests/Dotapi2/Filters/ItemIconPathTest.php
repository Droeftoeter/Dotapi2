<?php

use Dotapi2\Filters;

class ItemIconPathTest extends PHPUnit_Framework_TestCase
{

    public function testItemIconPath()
    {
        $filter = new Filters\ItemIconPath('enchanted_manglewood_staff', \Dotapi2\Types\IconType::Large);
        $this->assertArraySubset([
            'iconname' => 'enchanted_manglewood_staff',
            'icontype' => \Dotapi2\Types\IconType::Large
        ], $filter->toArray());
    }

}
