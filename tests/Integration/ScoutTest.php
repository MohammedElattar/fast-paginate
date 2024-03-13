<?php
/**
 * @author Aaron Francis <aarondfrancis@gmail.com|https://twitter.com/aarondfrancis>
 */

namespace Elattar\FastPaginate\Tests\Integration;

use Elattar\FastPaginate\Tests\Support\UserScout;

class ScoutTest extends Base
{
    /** @test */
    public function basic_scout_test()
    {
        $queries = $this->withQueriesLogged(function () {
            $results1 = UserScout::search('Person')->paginate();
            $results2 = UserScout::search('Person')->fastPaginate();

            $this->assertEquals($results1->count(), $results2->count());
        });

        $this->assertEquals(
            $queries[1]['query'],
            $queries[3]['query']
        );
    }
}
