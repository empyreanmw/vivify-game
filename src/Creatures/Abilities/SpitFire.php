<?php

namespace App\Creatures\Abilities;

class SpitFire implements AbilitiesInterface
{
    protected $damage=25;

    public function execute()
    {
        return $this->damage;
    }
}
