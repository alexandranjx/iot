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

    



}
?>
