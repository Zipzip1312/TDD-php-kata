<?php

/*
The task is to write a function which returns the sum of following series upto nth term(parameter).
Series: 1 + 1/4 + 1/7 + 1/10 + 1/13 + 1/16 +...
Rules:
- You need to round the answer to 2 decimal places and return it as String.
- If the given value is 0 then it should return 0.00
- You will only be given Natural Numbers as arguments.
Examples:
SeriesSum(1) => 1 = "1.00"
SeriesSum(2) => 1 + 1/4 = "1.25"
SeriesSum(5) => 1 + 1/4 + 1/7 + 1/10 + 1/13 = "1.57"
 */

use App\SeriesSum;
use PHPUnit\Framework\TestCase;

class SeriesSumTest extends TestCase
{
    /** @test */
    public function it_returns_sum_of_following_series()
    {
        $this->assertEquals('1.00', new SeriesSum(1));
        $this->assertEquals('1.25', new SeriesSum(2));
        $this->assertEquals('1.39', new SeriesSum(3));
        $this->assertEquals('1.49', new SeriesSum(4));
    }
}
