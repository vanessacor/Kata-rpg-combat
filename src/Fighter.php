<?php

namespace App;

use PhpParser\Node\Expr\Cast\Int_;
use PhpParser\Node\Expr\Cast\String_;

class Fighter
{

    private Int $health;
    private Int $level;
    private Bool $isAlive;
    private Int $maxRange;
    public String $fighterType;

    public function __construct($type = "default")
    {
        $this->health = 1000;
        $this->level = 1;
        $this->isAlive = true;
        $this->maxRange = 1;
        $this->fighterType = $type;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getMaxRange()
    {
        return $this->maxRange;
    }
    public function checkIsAlive()
    {
        return $this->isAlive;
    }

    public function checkPermission ($character) {
        return $this === $character;
    }

    public function checkType () {
        if($this->fighterType === "melee") {
            $this->maxRange = 2;
        }
        if($this->fighterType === "range") {
            $this->maxRange = 20;
        }
    }


    public function attack($victim, Int $damage) {
        if($this->checkPermission($victim)) {
            return;
        }
        $damage = $this->updateDamage($victim, $damage);
        if ($damage > $victim->health) {
            $victim->health = 0;
            $victim->isAlive = false;
            return;
        } 
        
        $victim->health -= $damage;
        return $victim->health;       
    }

    public function heal($fighter, Int $number) {
        $maxHealth = 1000;
        if(!$this->checkPermission($fighter)) {
            return;
        }
        if (!$fighter->isAlive) {
            return;
        }
        if($fighter->health + $number > $maxHealth) {
            $fighter->health = $maxHealth;
            return;
        } 
        $fighter->health += $number;
    }
    public function raiseLevel($value) {
        $this->level +=$value;
    }

    public function updateDamage($enemy, $number) {
        $levelDifference = 5;
        if(($enemy->level - $this->level) >= $levelDifference) {
            return $number = ($number / 2);
        }
        if(($this->level - $enemy->level) >= $levelDifference) {
            return $number = ($number * 2);
        }
        return $number;
    }
}
