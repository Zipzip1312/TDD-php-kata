<?php

namespace App;

class SeriesSum
{

    public function __construct(int $number)
    {
        $this->sum($number);
    }

    public function sum(int $number): float
    {
        return $number;
    }
}
