<?php

class Dice {

    /**
     * @var int
     */
    private $diceCount;

    /**
     * @var int
     */
    private $min = 1;

    /**
     * @var int
     */
    private $max = 6;

    /**
     * Dice constructor
     * 
     * @param diceCount int
     */
    public function __construct(int $diceCount) {
        $this->diceCount = $diceCount;
    }

    /**
     * Set Dice Count
     * 
     * @param diceCount int
     * 
     * @return void
     */
    public function setDiceCount($diceCount): void {
        $this->diceCount = $diceCount;
    }

    /**
     * Get Dice Count
     * 
     * @return int
     */
    public function getDiceCount(): int {
        return $this->diceCount;
    }

    /**
     * Roll the dice
     * 
     * @return int
     */
    public function rollDice(): int {
        $totalSum = 0;
        $diceUsed = 0;

        while ($diceUsed < $this->diceCount) {
            $totalSum += rand($this->min, $this->max);
            $diceUsed++;
        }

        return $totalSum;
    }
}
