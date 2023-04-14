<?php

class Jump {

    /**
     * @var int
     */
    private $startPosition;

    /**
     * @var int
     */
    private $endPosition;

    /**
     * Jump Constructor
     * 
     * @param startPosition int
     * @param endPosition   int
     */
    public function __construct(int $startPosition, int $endPosition) {
        $this->setStartPosition($startPosition);
        $this->setEndPosition($endPosition);
    }

    /**
     * Set Start Position
     * 
     * @param startPosition int
     * 
     * @return void
     */
    public function setStartPosition($startPosition): void {
        $this->startPosition = $startPosition;
    }

    /**
     * Get Start Position
     * 
     * @return int
     */
    public function getStartPosition(): int {
        return $this->startPosition;
    }

    /**
     * Set End Position
     * 
     * @param endPosition int
     * 
     * @return void
     */
    public function setEndPosition($endPosition): void {
        $this->endPosition = $endPosition;
    }

    /**
     * Get End Position
     * 
     * @return int
     */
    public function getEndPosition(): int {
        return $this->endPosition;
    }
}
