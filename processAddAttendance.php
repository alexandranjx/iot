<?php

require 'objects/autoload.php';
if ( isset($_GET['rfidNo']) ) {
    $rfidNumber = $_POST['rfidNo'];
    $dao = new operatorDAO();
    $add = $dao->updateAttendance($rfidNo, "SHUB928", "Changi", 'Peter');

}

else {
echo "Invalid submission";
}

?>