<?php
class attendance 
{
    private $rfidNo;
    private $employeeName;
    private $startTime;
    private $endTime;
    private $dateAdded;

    public function __construct($rfidNo, $employeeName, $startTime, $endTime, $dateAdded)
    {
      
        $this->rfidNo = $rfidNo;
        $this->employeeName = $employeeName;
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
}


    
?>
