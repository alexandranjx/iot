<?php
class rfidDAO{

    // Insert new enrolment
    public function addRFID($rfidNo, $employeeName)
    {
        date_default_timezone_set( 'Asia/Singapore');
        $today = date("Y-m-d");
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");
        
        $sql = "insert into rfid (rfidNo, employeeName, dateTimeAdded) values (:rfidNo,:employeeName, :today);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":today", $today);
        $stmt->bindParam(":rfidNo", $rfidNo);
        $stmt->bindParam(":employeeName", $employeeName);
        
        if ($stmt->execute()) {
            $stmt = null;
            $pdo = null;
            return true;
        }
        
        $stmt = null;
        $pdo = null;
        return false;
    }

    public function deleteRFID($rfidNo)
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");
        $sql = "delete from rfid where rfidNo =:rfidNo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":rfidNo", $rfidNo);
   
  
        if ($stmt->execute()) {
            $stmt = null;
            $pdo = null;
            return true;
        }
    }
        

    public function retrieve()
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from rfid";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();

        $rfid = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $rfid[] = new rfid($row["rfidNo"], $row["employeeName"], $row["dateTimeAdded"]);
        }

        $stmt = null;
        $pdo = null;
        return $rfid;
    }

    public function addAttendance($rfidNo)
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from rfid";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            $employeeName = $row["employeeName"];
        }

        date_default_timezone_set( 'Asia/Singapore');
        $today = date("Y-m-d");
        $time = time("hh:mm:s");
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");
        
        $sql = "insert into attedance (rfidNo, employeeName, starttime, dateTimeAdded) values (:rfidNo,:employeeName, :time,:today);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":today", $today);
        $stmt->bindParam(":time", $time);
        $stmt->bindParam(":rfidNo", $rfidNo);
        $stmt->bindParam(":employeeName", $employeeName);
        
        if ($stmt->execute()) {
            $stmt = null;
            $pdo = null;
            return true;
        }
        
        $stmt = null;
        $pdo = null;
        return false;


        

    }


}
?>