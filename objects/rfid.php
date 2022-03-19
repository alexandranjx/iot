<?php
class rfid 
{
    private $countRFID;
    private $rfidNo;
    private $employeeName;
    private $dateTimeAdded;

    public function __construct($countRFID, $rfidNo, $employeeName, $dateTimeAdded)
    {
        $this->countRFID = $countRFID;
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
    public function getcountRFID()
    {
        return $this->countRFID;
    }

    public function getDateTimeAdded()
    {
        return $this->dateTimeAdded;
    }
}


    
?>
