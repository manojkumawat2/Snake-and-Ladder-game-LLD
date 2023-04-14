<?php

require_once "./Cell.php";

class Board {
    /**
     * @var Cell
     */
    private $cells;

    /**
     * @var int
     */
    private $boardSize;

    /**
     * Board constructor
     * 
     * @param boardSize       int
     * @param numberOfSnacks  int
     * @param numberOfLadders int
     */
    public function __construct(int $boardSize, int $numberOfSnakes, int $numberOfLadders) {
        $this->setBoardSize($boardSize);
        $this->initializeCells();
        $this->addSnackLadders($numberOfLadders, $numberOfSnakes);
    }

    /**
     * Set board size
     * 
     * @param boardSize int
     * 
     * @return void
     */
    public function setBoardSize(int $boardSize): void {
        $this->boardSize = $boardSize;
    }

    /**
     * Intialize Cells
     * 
     * @return void
     */
    private function initializeCells(): void {
        $boardSize = $this->boardSize;
        $this->cells = [];

        for ($i = 0; $i < $boardSize; $i++) {
            for ($j = 0; $j < $boardSize; $j++) {
                $this->cells[$i][$j] = new Cell();
            }
        }
    }

    /**
     * Generate Random Snack and Ladder positions and store into cells
     * 
     * @param numberOfSnakes int
     * @param numberOfLadders int
     * 
     * @return void
     */
    private function addSnackLadders(int $numberOfSnakes, int $numberOfLadders): void {
        $totalCells = $this->boardSize * $this->boardSize;

        while ($numberOfSnakes) {
            $snakeHead = rand(1, $totalCells - 1);
            $snakeTail = rand(1, $totalCells - 1);

            if ($snakeTail >= $snakeHead) {
                continue;
            }

            $jump = new Jump($snakeHead, $snakeTail);

            $this->getCell($snakeHead)->setJump($jump);

            $numberOfSnakes--;
        }

        while ($numberOfLadders) {
            $ladderHead = rand(1, $totalCells - 1);
            $ladderTail = rand(1, $totalCells - 1);

            if ($ladderTail <= $ladderHead) {
                continue;
            }

            $jump = new Jump($ladderHead, $ladderTail);

            $this->getCell($ladderHead)->setJump($jump);

            $numberOfLadders--;
        }
    }

    /**
     * Get cell in board array based on player position
     * 
     * @param playerPosition int
     * 
     * @return Cell
     */
    private function getCell(int $playerPosition): Cell {
        $boardRow = $playerPosition / $this->boardSize;
        $boardColumn = $playerPosition % $this->boardSize;

        return $this->cells[$boardRow][$boardColumn];
    }
}
