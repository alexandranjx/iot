<?php

require 'objects/autoload.php';

$rfidNumber = $_GET["rfidNumber"];
$dao = new rfidDAO();
$add = $dao->deleteRFID($rfidNumber);
header('Location: viewRFID.php');
exit;


?>