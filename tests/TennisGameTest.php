<?php

/*
Tennis rules

1. A game is won by the first player to have won at least four points in total and at least two points more than the opponent.

2. The running score of each game is described in a manner peculiar to tennis:
- scores from zero to three points are described as “love”, “fifteen”, “thirty”, and “forty” respectively.

3. If at least three points have been scored by each player, and the scores are equal, the score is “deuce”.

4. If at least three points have been scored by each side and a player has one more point than his opponent,
the score of the game is “advantage” for the player in the lead.

 */

use App\TennisGame as Game;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{
    /** @test */
    public function it_scores_0_to_0()
    {
        $game = new Game;
        $this->assertEquals('love-love', $game->score());
    }
}
