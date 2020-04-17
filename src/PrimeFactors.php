<?php

namespace App;

class PrimeFactors
{
    public function generate($num)
    {
        $factors = [];

        // 1. Is the number divisible by 2
        // 2. If true, divide by 2. If false, increase a candidate and try again.
        // 3. Repeat

        for ($divisor = 2; $num > 1 ; $divisor++) {
            while ($num % $divisor === 0) {
                $factors[] = $divisor;
                $num = $num / $divisor;
            }
        }

        return $factors;
    }
}
