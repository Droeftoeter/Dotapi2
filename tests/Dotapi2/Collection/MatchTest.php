<?php
namespace Dotapi2\Tests\Collection;

use Dotapi2\Collection\CollectionFactory;
use Dotapi2\Collection\Match;

class MatchTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Match
     */
    protected $collection;

    public function setUp()
    {
        parent::setUp();
        $collectionFactory = new CollectionFactory();
        $this->collection = $collectionFactory->create('Match', [
            'results_remaining' => 490,
            'total_results' => 500,
            'matches' => [
                [
                    'match_id' => 2328989387,
                    'match_seq_num' => 2040184605,
                ],
                [
                    'match_id' => 2328989381,
                    'match_seq_num' => 2040184606,
                ],
                [
                    'match_id' => 2328989382,
                    'match_seq_num' => 2040184607,
                ],
            ],
        ]);
    }

    public function testFirst()
    {
        $this->assertInstanceOf('\Dotapi2\Entity\Match', $this->collection->first());
    }

    public function testCount()
    {
        $this->assertEquals(3, count($this->collection));
    }

    public function testSort()
    {
        $this->collection->sort(function(\Dotapi2\Entity\Match $a, \Dotapi2\Entity\Match $b){
            if ($a->getId() == $b->getId()) {
                return 0;
            }

            return ($a->getId() > $b->getId()) ? -1 : 1;
        });

        $this->assertEquals(2328989387, $this->collection->first()->getId());
    }

    public function testFilter()
    {
        $newCollection = $this->collection->filter(function($match){
            return ($match->getId() == 2328989381);
        });

        $this->assertEquals(2328989381, $newCollection->first()->getId());
    }

    public function testToArray()
    {
        $this->assertEquals([
            [
                'match_id' => 2328989387,
                'match_seq_num' => 2040184605,
            ],
            [
                'match_id' => 2328989381,
                'match_seq_num' => 2040184606,
            ],
            [
                'match_id' => 2328989382,
                'match_seq_num' => 2040184607,
            ],
        ], $this->collection->toArray());
    }

}

