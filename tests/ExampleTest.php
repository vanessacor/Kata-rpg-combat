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
        $result = $healer->heal($wounded, 120);

        $this->assertEquals("Your friend is dead and can not be healed...sorry", $result);
    }
    public function test_heal_cannot_raise_health_above_1000(
    ) {
        $healer = new Fighter();
        $wounded = new Fighter();
        $healer->heal($wounded, 20);
        $result = $wounded->getHealth();

        $this->assertEquals(1000, $result);
    }
}
