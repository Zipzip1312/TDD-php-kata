<?php

/*
Generate romain numerals from numbers
 */

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     * @dataProvider check
     */
    public function it_generates_the_roman_numeral($number, $numeral)
    {
        $this->assertEquals($numeral, RomanNumerals::generate($number));
    }

    public function check()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [13, 'XIII'],
            [14, 'XIV'],
            [17, 'XVII'],
            [19, 'XIX'],
            [50, 'L'],
            [100, 'C'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
        ];
    }
}
