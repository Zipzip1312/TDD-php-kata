<?php

/* FizzBuzz kata

- For multiples of three print "Fizz" instead of number
- For multiples of five print "Buzz"
- For numbers which are mulpitles of both three and five print "FizzBuzz"

Example
1 => 1
2 => 2
3 => fizz
4 => 4
5 => buzz
7 => 7
10 => buzz
12 => fizz
15 => fizzbuzz
20 => buzz
30 => fizzbuzz

 */

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** @test */
    public function it_works()
    {
        $this->assertEquals('fizz', FizzBuzz::generate(3));
    }
}
