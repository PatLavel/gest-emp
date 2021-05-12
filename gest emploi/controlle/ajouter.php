<?php session_start();
include_once(__DIR__."/../view/AfficheAjoutForm.php");
include_once(__DIR__ . "/../service/EmployeService.php");
include_once(__DIR__ . "/../service/ServiceService.php");



if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
$empserv = new EmployeService();
$dataemp = $empserv->getDirection();
$servserv = new ServiceService();
$dataserv = $servserv->getServices();
AfficheAjoutForm($dataemp,$dataserv);
?>