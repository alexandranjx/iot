<?php
class idlePeriod
{
    private $excavatorNo;
    private $location;
    private $idlePeriod;
    private $speed;
    private $dateAdded;



    public function __construct($excavatorNo, $location,$idlePeriod, $speed, $dateAdded)
    {
        $this->excavatorNo = $excavatorNo;
        $this->location = $location;
        $this->idlePeriod = $idlePeriod;
        $this->speed = $speed;
        $this->dateAdded = $dateAdded;
        
   
 
    }

    public function getExcavatorNo()
    {
        return $this->excavatorNo;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getIdlePeriod()
    {
        return $this->idlePeriod;
    }

    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    public function getSpeed()
    {
        return $this->speed;
    }


}



?>
