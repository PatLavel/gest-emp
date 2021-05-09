<?php session_start();
include_once("view/AfficheTableauEmp.php");

    if ($_SESSION['online'] == false) {
        header('location: connection.php');
    }$Empserv = new EmployeService();
    $Usersserv = new UsersService();
    $dataemp = $Empserv->getEmployes();
    $datasup = $Empserv->getSup();
    $datausers = $Usersserv->getAdmin();
    AfficheTableauEmp($dataemp,$datasup,$datausers);

    ?>