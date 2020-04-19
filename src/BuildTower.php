<?php

namespace App;

class BuildTower
{
    public static function build(int $floors): array
    {
        $tower = [];
        $floorsAmount = $floors;

        while ($floorsAmount--):
            $tower[] =  str_repeat(' ', $floorsAmount).
                        str_repeat('**', $floors - $floorsAmount).
                        str_repeat(' ', $floorsAmount);
        endwhile;

        for ($i = 0; $i < count($tower); $i++) {
            $replace = '/'.preg_quote('**', '/').'/';
            $tower[$i] =  preg_replace($replace, '*', $tower[$i], 1);
        }

        return $tower;
    }
}
