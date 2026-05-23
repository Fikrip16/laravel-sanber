<?php
require_once 'animal.php';

class Ape extends animal {
    public function __construct($legs) {
        parent::__construct($legs); 
        $this->legs = 2;
    }

    public function yell() {
        echo "Auooo<br>";
    }
}
?>







