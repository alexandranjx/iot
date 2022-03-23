<?php
class operator 
{
    private $rfidNo;
    private $employeeName;
    private $site;
    private $startTime;
    private $endTime;
    private $dateAdded;
    private $excavatorNo;


    public function __construct($rfidNo, $employeeName,$excavatorNo, $site, $startTime, $endTime, $dateAdded)
    {
      
        $this->rfidNo = $rfidNo;
        $this->employeeName = $employeeName;
        $this->excavatorNo = $excavatorNo;
        $this->site = $site;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->dateAdded = $dateAdded;
        
   
 
    }

    public function getRFID()
    {
        return $this->rfidNo;
    }

    public function getEmployeeName()
    {
        return $this->employeeName;
    }
    public function getExcavatorNo()
    {
        return $this->excavatorNo;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    public function getSite()
    {
        return $this->site;
    }



}



?>
