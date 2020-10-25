<?php

namespace Tests;

use  PHPUnit\Framework\TestCase;
use App\Fighter;


class FighterTest extends TestCase {

	public function test_initial_health(
		) {
			$character = new Fighter();
			$result = $character->health;
			
			$this->assertEquals(1000, $result);
		}
	public function test_initial_level(
		) {
			$character = new Fighter();
			$result = $character->level;
			
			$this->assertEquals(1, $result);
		}
	public function test_initial_isalive(
		) {
			$character = new Fighter();
			$result = $character->isAlive;
			
			$this->assertEquals(true, $result);
		}

	public function test_get_damage_reduces_health(
	) {
		$character = new Fighter();
		$result = $character->receiveDamage(1);
		
		$this->assertEquals(999, $result);
	}
	public function test_if_get_damage_bigger_health_health0(
		) {
			$character = new Fighter();
			$result = $character->receiveDamage(1020);
			
			$this->assertEquals(0, $result);
	}
	public function test_if_get_damage_bigger_health_alive_false(
		) {
			$character = new Fighter();
			$character->receiveDamage(1020);
			$result = $character->isAlive;
			
			$this->assertEquals(false, $result);
	}

	public function test_get_healed_on_dead_character(
		) {
			$character = new Fighter();
			$character->receiveDamage(1020);
			$result = $character->receiveHealth(12);
			
			$this->assertEquals("You are dead and can not be healed", $result);
		}
	public function test_get_healed_raises_health_above_1000(
		) {
			$character = new Fighter();
			$character->receiveDamage(100);
			$character->receiveHealth(122);
			$result = $character->health;

			$this->assertEquals(1000, $result);
		}
}


