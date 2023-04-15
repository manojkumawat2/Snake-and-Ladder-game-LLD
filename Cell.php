<?php

require_once "./Jump.php";

class Cell {

    /**
     * @var Jump|null
     */
    private $jump = null;

    /**
     * Cell constructor
     */
    public function __construct() {
    }

    /**
     * Set jump
     * 
     * @param $jump Jump
     * 
     * @return void
     */
    public function setJump(Jump $jump): void {
        $this->jump = $jump;
    }

    /**
     * Get jump
     * 
     * @return Jump|null
     */
    public function getJump(): ?Jump {
        return $this->jump;
    }
}
