<?php
class rfidDAO{

    // Insert new enrolment
    public function addRFID($rfidNo, $employeeName)
    {
        date_default_timezone_set( 'Asia/Singapore');
        $today = date("Y-m-d H:i:s");
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("rfid");
        
        $sql = "insert into rfid (rfidNo, employeeName, dateTimeEnrolled) values (:rfidNo,:employeeName, :today);";
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

    // public function retrieve()
    // {
    //     $conn_manager = new ConnectionManager();
    //     $pdo = $conn_manager->getConnection("rfid");
        
    //     $sql = "select * from rfid";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute();
        
    //     $rfid = null;
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     if ($row = $stmt->fetch()) {
    //         $rfid = new rfid($row["indexNo"], $row["rfidNo"], $row["employeeName"], $row["datetime"]);
    //     }
        
    //     $stmt = null;
    //     $pdo = null;
    //     return $rfid;
    // }

    public function retrieve()
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("rfid");

        $sql = "select * from rfid";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();

        $rfid = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $rfid[] = new rfid($row["countRFID"], $row["rfidNo"], $row["employeeName"], $row["dateTimeAdded"]);
        }

        $stmt = null;
        $pdo = null;
        return $rfid;
    }


}
?>