<?php

namespace App\Creatures;

use App\Creatures\Abilities\NormalAttack;

class Dragon
{
    protected $attacks = [
        NormalAttack::class,
        SpitFire::class
   ];

    public function executeAttack()
    {
        $attack = $this->attacks[rand(0, 1)];

        return (new $attack())->execute();
    }
}
