<?php

/* Prime Factors Kata

        100
    2       50
        2       25
            5       5

100 => 2 * 2 * 5 * 5

1. Is the number divisible by 2
2. If true, divide by 2. If false, increase a candidate and try again.
3. Repeat
 */

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;


class PrimeFactorsTest extends TestCase
{
    /** @test */
    public function it_generates_prime_factors_for_1()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([], $factors->generate(1), 'There should be no prime factors for 1');
    }

    /** @test */
    public function it_generates_prime_factors_for_2()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([2], $factors->generate(2), '2 is a prime number so it should return array with 2');
    }

    /** @test */
    public function it_generates_prime_factors_for_3()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([3], $factors->generate(3), '3 is a prime number so it should return array with 3');
    }
}
