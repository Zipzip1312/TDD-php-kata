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
    /**
     * @test
     * @dataProvider scores
     */
    function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new Game();

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $match->pointToPlayerOne();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $match->pointToPlayerTwo();
        }

        $this->assertEquals($score, $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: Player One'],
            [3, 4, 'Advantage: Player Two'],
            [4, 0, 'Winner: Player One'],
            [0, 4, 'Winner: Player Two'],
        ];
    }
}
