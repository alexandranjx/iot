<?php

require 'objects/autoload.php';
if ( isset($_POST['submit']) ) {
    $rfidNumber = $_POST["rfidNumber"];
    $employeeName = $_POST["employeeName"];
    $excavatorNo = $_POST["excavatorNo"];
    $issue = $_POST["issue"];
    $location = $_POST["location"];
    
    $dao = new excavatorDAO();
    $add = $dao->addIssue($rfidNumber, $employeeName,$location, $excavatorNo, $issue);
    header('Location: reportExcavator.php');
    exit;

}

else {
echo "Invalid submission";
}

?>