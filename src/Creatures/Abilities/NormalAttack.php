<?php

namespace App\Creatures\Abilities;

class NormalAttack implements AbilitiesInterface
{
    protected $damage;

    public function __construct($damage)
    {
        $this->damage = $damage;
    }

    public function execute()
    {
        return $this->damage;
    }
}
