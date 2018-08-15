<?php

namespace Building;


use LIB\BuildingAction\BuildingActions;

/**
 * Class Farm
 * @package Building
 */
class Farm
{
    use BuildingActions;

    /**
     * @var int
     */
    private $health = 50;
    /**
     * @var int
     */
    private $damage = 25;
    /**
     * @var string
     */
    private $name = 'farm';

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

}