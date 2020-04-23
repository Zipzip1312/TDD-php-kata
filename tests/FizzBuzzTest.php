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
    function it_returns_fizz_for_multiples_of_three()
    {
        foreach ([3, 6, 9, 12] as $number) {
            $this->assertEquals('fizz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    function it_returns_buzz_for_multiples_of_five()
    {
        foreach ([5, 10, 20, 25] as $number) {
            $this->assertEquals('buzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    function it_returns_fizzbuzz_for_multiples_of_three_and_five()
    {
        foreach ([15, 30, 45, 60] as $number) {
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    function it_returns_the_original_number_if_not_divisible_by_three_or_five()
    {
        foreach ([1, 2, 4, 7, 8, 11] as $number) {
            $this->assertEquals($number, FizzBuzz::convert($number));
        }
    }
}
