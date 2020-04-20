<?php

/* Prime Factors Kata

Compute the prime factors of a given natural number.
A prime number is only evenly divisible by itself and 1.
Note that 1 is not a prime number.

Example
What are the prime factors of 60?

Our first divisor is 2. 2 goes into 60, leaving 30.
2 goes into 30, leaving 15.
2 doesn't go cleanly into 15. So let's move on to our next divisor, 3.
3 goes cleanly into 15, leaving 5.
3 does not go cleanly into 5. The next possible factor is 4.
4 does not go cleanly into 5. The next possible factor is 5.
5 does go cleanly into 5.
We're left only with 1, so now, we're done.
Our successful divisors in that computation represent the list of prime factors of 60: 2, 2, 3, and 5.

Another example
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
