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

    public function attack($victim, Int $number)
    {
        if($this->checkPermission($victim)) {
            return;
        }
        if($this->compareLevel($victim) >= 5) {
            $number -= ($number / 2);
        }
        if ($number > $victim->health) {
            $victim->health = 0;
            $victim->isAlive = false;
            return;
        } 
            $victim->health -= $number;
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

    public function compareLevel($enemy) {
        $result = $enemy->level - $this->level;
        return $result;
    }
}
