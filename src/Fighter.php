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

    public function attack($victim, Int $number)
    {
        if ($number > $victim->health) {
            $victim->health = 0;
            $victim->isAlive = false;
        } else {
            $victim->health = $victim->health - $number;
            return $victim->health;

        }
    }

    public function heal($fighter, Int $number)
    {
        if ($fighter->isAlive == false) {
            return "Your friend is dead and can not be healed...sorry";
        }
        $fighter->health + $number > 1000 ? $fighter->health = 1000 : $fighter->health = $fighter->health + $number;
    }

}
