<?php

/*
Bowling rules

A game consists from 10 frames each frame has 1-2 rolls
If you knock down all the pins with firs ball, you got a "strike"
If you knock down all the pins with second ball, you got a "spare"

If you bowl a strike on 10 frame, you got 2 more balls.
If you throw a spare, you got 1 more balls.

Scoring is based on the number of pins you knock down.
If bowl got a spare, you get to add the pins in your next ball to that frame. For strike you get next two balls.

Strike score example
1 => 10
2 => 2
3 => 4
score = 10 + 2 + 4 + (2 + 4) = 16

Spare score example
1 => 5
2 => 5
3 => 2
score = 5 + 5 + 2 + 2 = 14

 */

use App\BowlingGame as Game;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    public function it_scores_a_gutter_game_as_zero()
    {
        $game = new Game;

        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }
}
