<?php

namespace Building;


use LIB\BuildingAction\BuildingActions;

/**
 * Class Castle
 * @package Building
 */
class Castle
{
    use BuildingActions;

    /**
     * @var int
     */
    private $health = 100;
    /**
     * @var int
     */
    private $damage = 10;
    /**
     * @var string
     */
    private $name = 'castle';

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

    

}