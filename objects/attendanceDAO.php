<?php
class attendanceDAO{

    public function retrieveAttendance()
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("rfid");

        $sql = "select * from attendance";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $attendance = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $attendance[] = new attendance($row["rfidNo"], $row["employeeName"], $row["starttime"], $row["endtime"],$row["dateTimeAdded"]);
        }

        $stmt = null;
        $pdo = null;
        return $attendance;
    }


}
?>