<?php session_start();
include_once("view/AfficheModifForm.php");


if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
$Empserv = new EmployeService;
$servserv = new ServiceService;
$dataemp = $Empserv->selectEmp($_GET["id"]);
$datasup = $Empserv->getDirection();
$dataserv = $servserv->getServices();

AfficheModifForm($dataserv,$datasup,$dataemp);
?>