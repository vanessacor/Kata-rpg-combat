# KataRPG Kombat

## Required

- PHP 7.4
- Composer installed

## Install

- composer install

## Run Tests

- vendor/bin/phpunit

### RPG Combat Kata

This is a fun kata that has the programmer building simple combat rules, as for a role-playing game (RPG). It is implemented as a sequence of iterations. The domain doesn't include a map kills or any other character sapart from their ability to damage and heal one another.

#### Iteration One

1. All Characters, when created, have:
   ◦ Health, starting at 1000
   ◦ Level, starting at 1
   ◦ May be Alive or Dead, starting Alive (Alive may be a true/false)
2. Characters can Deal Damage to Characters.
   ◦ Damage is subtracted from Health
   ◦ When damage received exceeds current Health, Health becomes 0 and the character dies
3. A Character can Heal a Character.
   ◦ Dead characters cannot be healed
   ◦ Healing cannot raise health above 1000
