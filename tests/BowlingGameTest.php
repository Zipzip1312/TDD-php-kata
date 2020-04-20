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
score = 10 + 2 + 4 + (2 + 4) = 22

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
    function it_scores_a_gutter_game_as_zero()
    {
        $game = new Game();

        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }

    /** @test */
    function it_scores_all_ones()
    {
        $game = new Game();

        foreach (range(1, 20) as $roll) {
            $game->roll(1);
        }

        $this->assertSame(20, $game->score());
    }

    /** @test */
    function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $game = new Game();

        $game->roll(5);
        $game->roll(5); // spare

        $game->roll(2);

        foreach (range(1, 17) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(14, $game->score());
    }

    /** @test */
    function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $game = new Game();

        $game->roll(10); // strike

        $game->roll(2);
        $game->roll(4);

        foreach (range(1, 16) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(22, $game->score());
    }

    /** @test */
    function a_spare_on_the_final_frame_grants_one_extra_ball()
    {
        $game = new Game();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5); // spare

        $game->roll(6);

        $this->assertSame(16, $game->score());
    }

    /** @test */
    function a_strike_on_the_final_frame_grants_two_extra_balls()
    {
        $game = new Game();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(10); // strike

        $game->roll(10);
        $game->roll(10);

        $this->assertSame(30, $game->score());
    }

    /** @test */
    function it_scores_a_perfect_game()
    {
        $game = new Game();

        foreach (range(1, 12) as $roll) {
            $game->roll(10);
        }

        $this->assertSame(300, $game->score());
    }
}
