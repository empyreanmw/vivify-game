<?php

namespace App\Weapons;

abstract class Weapon
{
    protected $damage;
    protected $eqquiped = false;
    protected $inInventory = true;

    public function hit()
    {
        return $this->damage;
    }

    public function getUsableClass()
    {
        return $this->usableClass;
    }
}
