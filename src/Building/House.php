<?php

namespace Building;


use LIB\BuildingAction\BuildingActions;

/**
 * Class House
 * @package Building
 */
class House
{
    use BuildingActions;

    /**
     * @var int
     */
    private $health = 75;
    /**
     * @var int
     */
    private $damage = 20;
    /**
     * @var string
     */
    private $name = 'house';

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }


}