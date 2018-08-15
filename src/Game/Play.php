<?php

namespace Game;

use Building\Castle;
use Building\Farm;
use Building\House;
/**
 * Class Play
 * @package Game
 */
class Play {
    /**
     * @var array
     */
    private $buildings = [];
    private $name;
    private $status;

    /**
     * Play constructor.
     * @param int $castleCount
     * @param int $houseCount
     * @param int $farmCount
     */
    public function __construct($name, $castleCount = 1, $houseCount = 4, $farmCount = 4)
    {
        $this->status = 'new';
        $this->name = $name;
        $this->buildCity($houseCount, $farmCount);
    }

    /**
     * @param int $repeat
     */
    public function attack ($repeat = 1, $hitChance = 90) {
        
        $message = '';
        if($this->getStatus() == 'ended')
        {
            return 'The game has ended.';
        }
        $destroyedBuildings = [];
        $remainingBuildings = [];

        $buildings = $this->getBuildings();
        $citySize = count($buildings);

        foreach ($buildings as $building)
        {
            if ($building->getHealth() > 0)
            {
                array_push($remainingBuildings, $building);
            }
        }
        for ($i=0; $i < $repeat; $i++) 
        {
            // only target buildings with more than 0 HP
            $targetedBuilding = $remainingBuildings[array_rand($remainingBuildings)];
            $rollForHit = mt_rand(1,100);

            if($rollForHit <= $hitChance)
            {
                $targetedBuilding->hit();
                $message =  $targetedBuilding->getName() . ' hit for ' . $targetedBuilding->getDamage();
            }
            else
            {
                $message =  $targetedBuilding->getName() . ' missed';
            }
        }

        // check for game end conditions
        foreach ($buildings as $building)
        {
            if ($building->getHealth() <= 0)
            {
                if ($building->getName() == 'castle')
                {
                    // unsure if this should also end the game. If so, uncomment the below.
                    // $this->status = 'ended';
                    $message .= '. The castle has been destroyed. The city has been taken.';
                    
                }
                array_push($destroyedBuildings, $building);
            }
        }
        if (count($destroyedBuildings) == $citySize)
        {
            $message .= '. All buildings have been destroyed! You have won';
            $this->status = 'ended';
        }

        $this->status = 'in progress';

        return $message;
    }

    /**
     * @param $houseCount
     */
    protected function buildCity($houseCount, $farmCount)
    {
        $this->buildings[] = new Castle();
        for ($i = 0; $i < $houseCount; $i++) {
            $house = new House();
            $this->buildings[] = $house;
        }
        for ($i = 0; $i < $farmCount; $i++) {
            $this->buildings[] = new Farm();
        }
    }

    /**
     * @return array
     */
    public function getBuildings()
    {
        return $this->buildings;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

}
