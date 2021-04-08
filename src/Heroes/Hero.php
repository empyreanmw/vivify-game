<?php

namespace App\Heroes;

use App\Backpack;
use App\Ground;

abstract class Hero
{
    public $backpack;
    protected $health;
    protected $activeWeapon;
    protected $startingWeapon;

    public function __construct()
    {
        $this->activeWeapon = new $this->startingWeapon();
        $this->backpack = new Backpack();
    }

    public function swapWeapon()
    {
        $newWeapon = $this->backpack->takeItem();
        
        $this->backpack->addItem($this->activeWeapon);

        $this->setActiveWeapon($newWeapon);
    }

    public function setActiveWeapon($weapon)
    {
        $this->activeWeapon = $weapon;
    }

    public function dropWeapon()
    {
        Ground::getInstance()->addItem($this->activeWeapon);

        $newWeapon = $this->backpack->takeItem();

        $this->setActiveWeapon($newWeapon);
    }

    public function pickUpItem()
    {
        $groundWeapon = Ground::getInstance()->takeItem();

        if (!$this->checkIfWeaponIsUsable($groundWeapon)) {
            throw new \Exception('Weapon is not usable for this class');
        }
        

        $this->backpack->addItem($groundWeapon);
    }

    public function useWeapon()
    {
        return $this->activeWeapon->hit();
    }

    protected function checkIfWeaponIsUsable($weapon)
    {
        $heroClass = new \ReflectionClass($this);

        return $heroClass->getShortName() == $weapon->getUsableClass();
    }
}
