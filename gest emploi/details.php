<?php session_start();
include_once("view/AfficheDetail.php");
if ($_SESSION['online'] == false) {
    header('location: connection.php');
}

$empserv = new EmployeService();
$data = $empserv->selectEmp($_GET["id"]);
AfficheDetail($data);