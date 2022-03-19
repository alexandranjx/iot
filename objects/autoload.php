<?php
spl_autoload_register(
    function ($test) {
        require_once  "$test.php";
    }
);
session_start();
?>
