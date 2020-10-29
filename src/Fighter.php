<?php

namespace App;

class Fighter
{

    private Int $health;
    private Int $level;
    private Bool $isAlive;

    public function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->isAlive = true;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function checkIsAlive()
    {
        return $this->isAlive;
    }

    public function checkPermission ($character) {
        return $this === $character;
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
