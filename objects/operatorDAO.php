<?php
class operatorDAO{


    public function retrieveOperatorActivities($employeeName)
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from operatorActivities where employeeName=:employeeName";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":employeeName", $employeeName);
        $stmt->execute();

        $job = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $job[] = new operator($row["rfidNo"], $row["employeeName"], $row["excavatorNo"], $row["site"], $row["starttime"], $row["endtime"], $row["dateTimeAdded"]);
        }
        // var_dump($rfid);

        $stmt = null;
        $pdo = null;
        return $job;
    }

    public function retrieveOperatorAttendance($employeeName)
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from operatorAttendance where employeeName=:employeeName";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":employeeName", $employeeName);
        $stmt->execute();

        $attendance = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $attendance[] = new operator($row["rfidNo"], $row["employeeName"], $row["excavatorNo"], $row["location"], $row["starttime"], $row["endtime"], $row["dateTimeAdded"] );
        }
        // var_dump($rfid);

        $stmt = null;
        $pdo = null;
        return $attendance;
    }

    public function retrieveAllAttendance()
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from operatorAttendance";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $attendance = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $attendance[] = new operator($row["rfidNo"], $row["employeeName"], $row["excavatorNo"], $row["location"], $row["starttime"], $row["endtime"], $row["dateTimeAdded"] );
        }

        $stmt = null;
        $pdo = null;
        return $attendance;
    }

    public function updateAttendance($rfidNo, $excavatorNo, $location, $employeeName)
    {
        date_default_timezone_set( 'Asia/Singapore');
        $dateTimeAdded = date("Y-m-d");
        $starttime = time("hh:mm:s");

        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "insert into operatorAttendance (rfidNo, employeeName, location, excavatorNo, starttime, dateTimeAdded) values (:rfidNo,:employeeName,:location,:excavatorNo,:starttime,:dateTimeAdded);";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":dateTimeAdded", $dateTimeAdded);
        $stmt->bindParam(":rfidNo", $rfidNo);
        $stmt->bindParam(":employeeName", $employeeName);
        $stmt->bindParam(":excavatorNo", $excavatorNo);
        $stmt->bindParam(":location", $location);
        $stmt->bindParam(":starttime", $starttime);
        $status = $stmt->execute();

        $stmt = null;
        $pdo = null;

        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");
        $sql = "select * from operatorAttendance where rfidNo=:rfidNo and excavatorNo=:excavatorNo and location=:location and dateTimeAdded=:dateTimeAdded";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":rfidNo", $rfidNo);
        $stmt->bindParam(":excavatorNo", $excavatorNo);
        $stmt->bindParam(":location", $location);
        $stmt->execute();

        $attendance = '';
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            $attendance = $row["rfidNo"];
            if($attendance != ''){
                $conn_manager = new ConnectionManager();
                $pdo = $conn_manager->getConnection("iot");
        
                $sql = "UPDATE `operatorAttendance` 
                        SET endtime = starttime
                        WHERE rfidNo=:rfidNo AND excavatorNo=:excavatorNo AND location=:location AND dateTimeAdded=:dateTimeAdded";
        
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":dateTimeAdded", $dateTimeAdded);
                $stmt->bindParam(":rfidNo", $rfidNo);
                $stmt->bindParam(":excavatorNo", $excavatorNo);
                $stmt->bindParam(":location", $location);
                $status = $stmt->execute();
            }
            
        }
        else { //clock in
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection("iot");
            $sql = "select * from rfid where rfidNo=:rfidNo";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            $employeeName = '';
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($row = $stmt->fetch()) {
                $employeeName = $row["employeeName"];
            }

            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection("iot");
            $sql = "insert into operatorAttendance (rfidNo, employeeName, location, excavatorNo, starttime, dateTimeAdded) values (:rfidNo,:employeeName,:location,:excavatorNo,:starttime,:dateTimeAdded);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":dateTimeAdded", $dateTimeAdded);
            $stmt->bindParam(":rfidNo", $rfidNo);
            $stmt->bindParam(":employeeName", $employeeName);
            $stmt->bindParam(":excavatorNo", $excavatorNo);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":starttime", $starttime);
            $status = $stmt->execute();
        
        }
        // var_dump($rfid);

        $stmt = null;
        $pdo = null;
        return $status;
    }
    



}
?>
