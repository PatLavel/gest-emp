<?php session_start();
include("view/AfficheAjoutForm.php");



if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
$empserv = new EmployeService();
$dataemp = $empserv->getDirection();
$servserv = new ServiceService();
$dataserv = $servserv->getServices();
AfficheAjoutForm($dataemp,$dataserv);
?>