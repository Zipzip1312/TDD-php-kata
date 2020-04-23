<?php

namespace App;

class TennisGame
{
    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;

    /**
     * Score the match.
     *
     * @return string
     */
    public function score(): string
    {
        if ($this->hasWinner()) {
            return 'Winner: '.$this->leader();
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: '.$this->leader();
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->pointsToTerm($this->playerOnePoints),
            $this->pointsToTerm($this->playerTwoPoints),
        );
    }

    /**
     * Add point to Player One
     */
    public function pointToPlayerOne(): void
    {
        $this->playerOnePoints++;
    }

    /**
     * Add point to Player Two
     */
    public function pointToPlayerTwo(): void
    {
        $this->playerTwoPoints++;
    }

    /**
     * Get the current leader of the set.
     *
     * @return Player
     */
    protected function leader(): string
    {
        return $this->playerOnePoints > $this->playerTwoPoints
            ? 'Player One'
            : 'Player Two';
    }

    /**
     * Determine if the players are in deuce.
     *
     * @return bool
     */
    protected function isDeuce(): bool
    {
        if (! $this->hasReachedDeuceThreshold()) {
            return false;
        }

        return $this->playerOnePoints === $this->playerTwoPoints;
    }

    /**
     * Determine if both players have scored at least 3 points.
     *
     * @return bool
     */
    protected function hasReachedDeuceThreshold(): bool
    {
        return $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3;
    }

    /**
     * Determine if one player has the advantage.
     *
     * @return bool
     */
    protected function hasAdvantage(): bool
    {
        if (! $this->hasReachedDeuceThreshold()) {
            return false;
        }

        return ! $this->isDeuce();
    }

    /**
     * Determine if there is a winner.
     *
     * @return bool
     */
    protected function hasWinner(): bool
    {
        if ($this->playerOnePoints < 4 && $this->playerTwoPoints < 4) {
            return false;
        }

        return abs($this->playerOnePoints - $this->playerTwoPoints) >= 2;
    }

    /**
     * Convert the player's score to the Tennis term.
     *
     * @return stringa
     */
    protected function pointsToTerm($points): string
    {
        switch ($points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }
}
