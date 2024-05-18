<?php

class RoboticPet extends Pet
{
    private $_accessories = [];

    /**
     * RoboticPet constructor.
     * @param array $accessories
     */
    public function __construct(array $accessories = [])
    {
        $this->_accessories = $accessories;
    }

    /**
     * Add an accessory.
     * @param string $accessory
     */
    public function addAccessory($accessory)
    {
        $this->_accessories[] = $accessory;
    }

    /**
     * Get all accessories.
     * @return array
     */
    public function getAccessories()
    {
        return $this->_accessories;
    }
}
