<?php

require_once "./Board.php";
require_once "./Dice.php";
require_once "./Player.php";

class Game {
    
    /**
     * @var Board
     */
    private $board;

    /**
     * @var Dice
     */
    private $dice;

    /**
     * @var array
     */
    private $playersList = [];

    /**
     * @var Player
     */
    private $winner;

    /**
     * Game constructor
     */
    public function __construct() {
        $this->initializeGame();
    }

    /**
     * Intialize a new game
     * 
     * @return void
     */
    private function initializeGame(): void {
        $this->board = new Board(10, 5, 4);
        $this->dice = new Dice(1);
        $this->winner = null;
        $this->addPlayers();
    }

    /**
     * Add Players
     * 
     * @return void
     */
    private function addPlayers(): void {
        $this->playersList[] = new Player(1, 0);
        $this->playersList[] = new Player(2, 0);
        $this->playersList[] = new Player(3, 0);
        $this->playersList[] = new Player(4, 0);
    }

    /**
     * Start the game
     */
    public function startGame(): void {
        $boardSize = $this->board->getBoardSize();

        while (true) {
            // check whose turn now
            $playerTurn = $this->findPlayerTurn();

            echo "Player turn is: P" . $playerTurn->getId() . " current position is: " . $playerTurn->getCurrentPosition() . PHP_EOL;

            // roll the dice
            $diceNumber = $this->dice->rollDice();

            // get the new position of player
            $playerNewPosition = $playerTurn->getCurrentPosition() + $diceNumber;
            $playerNewPosition = $this->checkJump($playerNewPosition);

            $playerTurn->setCurrentPosition($playerNewPosition);

            if ($playerNewPosition >= ($boardSize * $boardSize - 1)) {
                $this->winner = $playerTurn;
                break;
            }
        }

        echo "WINNER IS: P" . $this->winner->getId() . PHP_EOL;
    }

    /**
     * Find the player with current turn
     * 
     * @return Player
     */
    private function findPlayerTurn(): Player {
        $player = array_shift($this->playersList);
        $this->playersList[] = $player;
        return $player;
    }

    /**
     * Check jump
     * 
     * @param currentPosition int
     * 
     * @return int
     */
    private function checkJump(int $currentPosition): int {
        $boardSize = $this->board->getBoardSize();

        if ($currentPosition > ($boardSize * $boardSize - 1)) {
            return $currentPosition;
        }

        $cell = $this->board->getCell($currentPosition);
        $jump = $cell->getJump();

        if ($jump != null && $jump->getStartPosition() == $currentPosition) {
            echo "jump done by " . ($jump->getStartPosition() < $jump->getEndPosition()) ? "ladder" : "snack";
            
            return $jump->getEndPosition();
        }

        return $currentPosition;
    }
}