<?php

namespace App;

class PrimeFactors
{
    public function generate($num)
    {
        if ($num > 1) {
            return [$num];
        }
        return [];
    }
}
