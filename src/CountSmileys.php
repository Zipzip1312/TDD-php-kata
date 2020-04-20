<?php

namespace App;

class CountSmileys
{
    public function count(array $array): int
    {
        $counter    = 0;
        $validEyes  = [':', ';'];
        $validMouth = [')', 'D'];
        $validNose  = ['-', '~'];

        for ($i = 0; $i < count($array); $i++) {
            $str = $array[$i];
            $len = strlen($str);

            if (in_array($str[0], $validEyes)) { // must have eyes first
                if (in_array($str[$len-1], $validMouth)) { // there should be a mouth at the end
                    if ($len === 2) { // no nose
                        $counter++;
                    }
                    else { // has nose
                        if (in_array($str[1], $validNose) && $len === 3) { // must have valid nose and no extra chars
                            $counter++;
                        }
                    }
                }
            }
        }

        return $counter;
    }

    public function countWithRegex(array $array): int
    {
        return sizeof(preg_grep('/^[:;][-~]?[)D]$/', $array));
    }
}
