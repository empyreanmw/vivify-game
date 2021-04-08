<?php

namespace App;

class Backpack
{
    protected $items = [];
    protected $invetory_slots = 2;

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        if ($this->fullInventory()) {
            throw new \Exception("Inventory full");
        }

        array_push($this->items, $item);
    }

    public function takeItem()
    {
        if ($this->emptyInventory()) {
            throw new \Exception("Inventory is empty");
        }

        return array_shift($this->items);
    }

    protected function fullInventory()
    {
        return count($this->items) > 2;
    }

    protected function emptyInventory()
    {
        return count($this->items) <= 0;
    }
}
