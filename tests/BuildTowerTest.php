<?php

/*
Build Tower by the following given argument:
number of floors (integer and always greater than 0).
for example, a tower of 3 floors looks like below
[
  '  *  ',
  ' *** ',
  '*****'
]
and a tower of 6 floors looks like below
[
  '     *     ',
  '    ***    ',
  '   *****   ',
  '  *******  ',
  ' ********* ',
  '***********'
]
 */

use App\BuildTower;
use PHPUnit\Framework\TestCase;

class BuildTowerTest extends TestCase
{
    /** @test */
    public function base_test()
    {
        $this->assertEquals(['*'], BuildTower::build(1));
    }
}
