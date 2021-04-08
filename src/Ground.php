<?php

namespace App;

class Ground
{
    protected static $instance = null;
    protected static $items = [];
    protected $invetory_slots = 2;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Backpack();
        }
   
        return self::$instance;
    }

    public static function getItems()
    {
        return self::$items;
    }

    public static function addItem($item)
    {
        array_push(self::$items, $item);
    }

    public static function takeItem()
    {
        if (self::emptyInventory()) {
            throw new \Exception("There is no items on the ground");
        }

        return array_shift(self::$items);
    }

    protected static function fullInventory()
    {
        return count(self::$items) > 2;
    }

    protected static function emptyInventory()
    {
        return count(self::$items) <= 0;
    }
}
