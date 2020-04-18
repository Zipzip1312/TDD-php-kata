<?php

namespace App;

class RomanNumerals
{
    const NUMERALS = [
        1000 => 'M',
        900  => 'CM',
        500  => 'D',
        400  => 'CD',
        100  => 'C',
        90   => 'XC',
        50   => 'L',
        40   => 'XL',
        10   => 'X',
        9    => 'IX',
        5    => 'V',
        4    => 'IV',
        1    => 'I',
    ];

    public static function generate($number)
    {
        if ( ! is_int($number) || $number <= 0 || $number >= 4000) {
            throw new \Exception("Invalid number");
        }

        $result = '';

        foreach (static::NUMERALS as $arabic => $numeral) {
            for (; $number >= $arabic; $number -= $arabic) {
                $result .= $numeral;
            }
        }

        return $result;
    }
}
