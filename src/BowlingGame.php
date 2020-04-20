<?php

namespace App;

class BowlingGame
{
    const FRAMES_PER_GAME = 10;

    protected $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll  = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            // check a strike
            if ($this->rolls[$roll] === 10) {
                $score += $this->rolls[$roll];
                $score += $this->rolls[$roll + 1];
                $score += $this->rolls[$roll + 2];

                $roll += 1;
                continue;
            }

            // check a spare
            if ($this->rolls[$roll] + $this->rolls[$roll + 1] === 10) {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
                $score += $this->rolls[$roll + 2];

                $roll += 2;
                continue;
            }

            $score += $this->rolls[$roll] + $this->rolls[$roll + 1];

            $roll += 2;
        }

        return $score;
    }
}
