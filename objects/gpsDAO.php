<?php
class gpsDAO{


    public function retrieveAll()
    {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection("iot");

        $sql = "select * from excavatorGPS";
        $stmt = $pdo->prepare($sql);
     
        $stmt->execute();

        $gps = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $gps[] = new idlePeriod($row["excavatorNo"], $row["location"], $row["idlePeriod"],$row["speed"],$row["dateTimeAdded"]);
        }
        
        $stmt = null;
        $pdo = null;

        return $gps;
    }


}
?>