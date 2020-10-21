<?php

namespace Tests;

use  PHPUnit\Framework\TestCase;
use App\RpgCombat;


class RpgCombatTest extends TestCase {

	public function test_inflict_damage_reduces_health(
	) {
		$character = new RpgCombat();
		$result = $character->inflictDamage(1);
		
		$this->assertEquals(99, $result);
	}
	public function test_if_inflict_damage_bigger_health_health0(
		) {
			$character = new RpgCombat();
			$result = $character->inflictDamage(200);
			
			$this->assertEquals(0, $result);
	}
	public function test_if_inflict_damage_bigger_health_alive_false(
		) {
			$character = new RpgCombat();
			$character->inflictDamage(200);
			$result = $character->isAlive;
			
			$this->assertEquals(false, $result);
	}

	
}


