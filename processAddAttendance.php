<?php

require 'objects/autoload.php';
if ( isset($_GET[$rfidNumber]) ) {
    $rfidNumber = $_GET["rfidNumber"];
    $dao = new rfidDAO();
    $add = $dao->addAttendance($rfidNumber);
    header('Location: viewRFID.php');
    exit;
}

else {
echo "Invalid submission";
}

?>