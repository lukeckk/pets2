<?php
class RoboticPet extends Pet
{
    private $_accessories = [];

    /**
     * @param array $_accessories
     */
    public function __construct(array $_accessories)
    {
        $this->_accessories = $_accessories;
    }


}