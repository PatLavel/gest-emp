<?php session_start();
include_once(__DIR__."/../view/AfficheTableauEmp.php");
include_once(__DIR__ . "/../service/EmployeService.php");
include_once(__DIR__ . "/../service/UsersService.php");
include_once(__DIR__ . "/../service/serviceService.php");

    if ($_SESSION['online'] == false) {
        header('location: connection.php');
    }$Empserv = new EmployeService();
    $Usersserv = new UsersService();
    try{
    $dataemp = $Empserv->getEmployes();
    $datasup = $Empserv->getSup();
    $datausers = $Usersserv->getAdmin();
    AfficheTableauEmp($dataemp,$datasup,$datausers);
}catch(EmployeServiceException $e){
    echo $e;
}
    ?>