<?php

namespace App;

class RpgCombat {

  public Int $health;
  public Int $level;
  public Bool $isAlive;

  public function __construct()
    {
        $this->health = 100;
        $this->level = 1;
        $this->isAlive = true;
    }

  public function inflictDamage(Int $number) {
    if($number > $this->health) {
      $this->health = 0;
      $this->isAlive = false;
    }
    else {
      $this->health = $this->health - $number;
      return  $this->health;

    }
  }
}