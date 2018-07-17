<?php

class Slime {
    public $type = 'スライム';
    public $hp = 10;
    public $bet = 3;

    function attack($character_name) {
        print $this->type . 'が' . $this->bet . '円賭けた！' . PHP_EOL;
    }
}

$slime_A = new Slime();

$slime_A->attack('主人公');

print_r($slime_A);