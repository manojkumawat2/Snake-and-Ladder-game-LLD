<?php

class Player {

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $currentPosition;

    /**
     * Player constructor
     * 
     * @param id              int
     * @param currentPosition int
     */
    public function __construct(int $id, int $currentPosition) {
        $this->setId($id);
        $this->setCurrentPosition($currentPosition);
    }

    /**
     * Set player id
     * 
     * @param id int
     * 
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Get player id
     * 
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set player current position on board
     * 
     * @param currentPosition int
     * 
     * @return void
     */
    public function setCurrentPosition(int $currentPosition): void {
        $this->currentPosition = $currentPosition;
    }

    /**
     * Get player current position on board
     * 
     * @return int
     */
    public function getCurrentPosition(): int {
        return $this->currentPosition;
    }
}
