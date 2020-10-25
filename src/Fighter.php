<?php

namespace App;

class Fighter {

  public Int $health;
  public Int $level;
  public Bool $isAlive;

  public function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->isAlive = true;
    }

  public function getDamage(Int $number) {
    if($number > $this->health) {
      $this->health = 0;
      $this->isAlive = false;
    }
    else {
      $this->health = $this->health - $number;
      return  $this->health;

    }
  }
  public function getHealed(Int $number) {
    if($this->isAlive === false) {
      return "You are dead and can not be healed";
    }
    $this->health + $number > 1000 ? $this->health = 1000 : $this->health = $this->health + $number;
  }

}