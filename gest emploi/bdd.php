<?php session_start();
include_once("view/AfficheTableauEmp.php");

    if ($_SESSION['online'] == false) {
        header('location: connection.php');
    }
    AfficheTableauEmp();

    ?>