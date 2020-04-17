<?php

/* Prime Factors Kata

        100
    2       50
        2       25
            5       5

100 => 2 * 2 * 5 * 5
 */

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @test
     * @dataProvider factors
     */
    public function it_generates_prime_factors($num, $expected)
    {
        $factors = new PrimeFactors;

        $this->assertEquals($expected, $factors->generate($num));
    }

    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [9, [3, 3]],
            [10, [2, 5]],
            [100, [2, 2, 5, 5]],
            [999, [3, 3, 3, 37]]
        ];
    }
}
