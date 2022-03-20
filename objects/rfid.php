<?php
class rfid 
{
  
    private $rfidNo;
    private $employeeName;
    private $dateTimeAdded;

    public function __construct($rfidNo, $employeeName, $dateTimeAdded)
    {
      
        $this->rfidNo = $rfidNo;
        $this->employeeName = $employeeName;
        $this->dateTimeAdded = $dateTimeAdded;
 
    }

    public function getRFID()
    {
        return $this->rfidNo;
    }

    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    public function getDateTimeAdded()
    {
        return $this->dateTimeAdded;
    }
}


    
?>
