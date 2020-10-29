<?php

namespace Tests;

use App\Fighter;
use PHPUnit\Framework\TestCase;

class FighterTest extends TestCase
{

    public function test_initial_health(
    ) {
        $character = new Fighter();
        $result = $character->getHealth();

        $this->assertEquals(1000, $result);
    }
    public function test_initial_level(
    ) {
        $character = new Fighter();
        $result = $character->getLevel();

        $this->assertEquals(1, $result);
    }
    public function test_initial_isalive(
    ) {
        $character = new Fighter();
        $result = $character->checkIsAlive();

        $this->assertEquals(true, $result);
    }

    public function test_attack_reduces_health(
    ) {
        $victim = new Fighter();
        $attacker = new Fighter();
        $attacker->attack($victim, 1);
        $result = $victim->getHealth();

        $this->assertEquals(999, $result);
    }

    public function test_if_attack_bigger_health_health0(
    ) {
        $victim = new Fighter();
        $attacker = new Fighter();
        $attacker->attack($victim, 1020);
        $result = $victim->getHealth();

        $this->assertEquals(0, $result);
    }
    public function test_if_attack_bigger_health_alive_false(
    ) {
        $victim = new Fighter();
        $attacker = new Fighter();
        $attacker->attack($victim, 1020);
        $result = $victim->checkIsAlive();

        $this->assertEquals(false, $result);
    }

    public function test_heal_on_dead_character(
    ) {
        $healer = new Fighter();
        $wounded = new Fighter();
        $healer->attack($wounded, 1020);
        $healer->heal($wounded, 120);
        $result = $wounded->checkIsAlive();

        $this->assertEquals(false, $result);
    }
    public function test_heal_cannot_raise_health_above_1000(
    ) {
        $healer = new Fighter();
        $wounded = new Fighter();
        $healer->heal($wounded, 20);
        $result = $wounded->getHealth();

        $this->assertEquals(1000, $result);
    }

    public function test_character_cannot_deal_Damage_to_itself() 
    {
        $fighter = new Fighter();
        $fighter->attack($fighter, 100);
        $result = $fighter->getHealth();
        
        $this->assertEquals(1000, $result);
    }

    public function test_character_can_only_Heal_itself() 
    {
        $fighter = new Fighter();
        $enemy = new Fighter();
        $fighter->attack($enemy, 100);
        $fighter->heal($enemy, 100);
        $result = $enemy->getHealth();
        
        $this->assertEquals(900, $result);
    }
    
}
