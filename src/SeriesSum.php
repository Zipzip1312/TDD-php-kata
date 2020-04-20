<?php

namespace App;

class SeriesSum
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        return $this->sum();
    }

    private function sum(): string
    {
        $array    = [];
        $division = 1;

        for ($i = 1; $i <= $this->number; $i++) {
            $array[] = (1 / $division);
            $division += 3;
        };

        return number_format(array_sum($array), 2, '.', '');
    }
}
