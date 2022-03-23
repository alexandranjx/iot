<?php
class excavatorDAO{

    public function retrieveExcavatorHistory($employeeName)
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from reportExcavator where employeeName=:employeeName";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":employeeName", $employeeName);
        $stmt->execute();

        $attendance = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $attendance[] = new excavator($row["rfidNo"], $row["employeeName"], $row["location"], $row["excavatorNo"], $row["issue"],$row["dateTimeAdded"]);
        }
        

        $stmt = null;
        $pdo = null;
        return $attendance;
    }

    public function addIssue($rfidNo, $employeeName, $location, $excavatorNo, $issue)
    {
        date_default_timezone_set( 'Asia/Singapore');
        $today = date("Y-m-d");
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");
        
        $sql = "insert into reportExcavator (rfidNo, employeeName, location, excavatorNo, issue, dateTimeAdded) values (:rfidNo,:employeeName,:location,:excavatorNo,:issue, :today);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":today", $today);
        $stmt->bindParam(":rfidNo", $rfidNo);
        $stmt->bindParam(":excavatorNo", $excavatorNo);
        $stmt->bindParam(":issue", $issue);
        $stmt->bindParam(":employeeName", $employeeName);
        $stmt->bindParam(":location", $location);
        
        if ($stmt->execute()) {
            $stmt = null;
            $pdo = null;
            return true;
        }
        
        $stmt = null;
        $pdo = null;
        return false;
    }

    public function retrieveAll()
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from reportExcavator";
        $stmt = $pdo->prepare($sql);
     
        $stmt->execute();

        $attendance = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $attendance[] = new excavator($row["rfidNo"], $row["employeeName"],$row["location"], $row["excavatorNo"], $row["issue"],$row["dateTimeAdded"]);
        }
        

        $stmt = null;
        $pdo = null;
        return $attendance;
    }


}
?>