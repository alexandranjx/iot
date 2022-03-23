<?php
class excavator 
{
    private $rfidNo;
    private $employeeName;
    private $location;
    private $excavatorNo;
    private $issue;
    private $dateAdded;

    public function __construct($rfidNo, $employeeName, $location, $excavatorNo, $issue, $dateAdded)
    {
      
        $this->rfidNo = $rfidNo;
        $this->employeeName = $employeeName;
        $this->location = $location;
        $this->excavatorNo = $excavatorNo;
        $this->issue = $issue;
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

    public function getLocation()
    {
        return $this->location;
    }

    public function getExcavatorNo()
    {
        return $this->excavatorNo;
    }

    public function getIssue()
    {
        return $this->issue;
    }

    public function getDateAdded()
    {
        return $this->dateAdded;
    }
}


    
?>
