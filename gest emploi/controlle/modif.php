<?php session_start();
include_once(__DIR__."/../view/AfficheModifForm.php");
include_once(__DIR__ . "/../service/EmployeService.php");
include_once(__DIR__ . "/../service/ServiceService.php");


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