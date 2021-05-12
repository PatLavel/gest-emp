<?php session_start();
include_once(__DIR__."/../view/AfficheHTML.php");
include_once(__DIR__."/../service/EmployeService.php");

if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
try {
$empserv = new EmployeService();
$data = $empserv->selectEmp($_GET["id"]);
AfficheDetail($data);
} catch (EmployeServiceException $e) { echo ( $e->getMessage());
    
}