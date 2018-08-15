<?php

namespace LIB\BuildingAction;

/**
 * Trait BuildingActions
 * @package LIB\BuildingAction
 */
trait BuildingActions {
    /**
     *
     */
    public function hit()
    {
        $this->health -= $this->damage;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getDamage()
    {
        return $this->damage; 
    }
}