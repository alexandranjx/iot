<?php

require 'objects/autoload.php';
if ( isset($_POST['submit']) ) {
    $rfidNumber = $_POST["rfidNumber"];
    $employeeName = $_POST["employeeName"];
    
    $dao = new rfidDAO();
    $add = $dao->addRFID($rfidNumber, $employeeName);
    header('Location: viewRFID.php');
    exit;

}

else {
echo "Invalid submission";
}

?>