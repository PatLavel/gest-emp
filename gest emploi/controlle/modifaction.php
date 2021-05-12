<?php session_start();
include_once(__DIR__ . "/../service/EmployeService.php");
include_once(__DIR__ . "/../service/ServiceService.php");
if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
try {
    if ((preg_match("#^1[0-9]{3}#", $_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["poste"])) && (preg_match("#^1[0-9]00#", $_POST["sup"])) && (preg_match("#^[a-z]{1,20}$#i", $_POST["service"]))) {
        $empserv = new EmployeService;
        $servserv = new ServiceService;
        $dataserv = $servserv->getSingleService($_POST["service"]);
        $modif = (new Employe())->setNoemp($_POST["id"])->setNom($_POST["nom"])
            ->setPrenom($_POST["prenom"])->setEmploi($_POST["poste"])
            ->setSup($_POST["sup"])->setNoserv($dataserv[0]['noserv']);


        $empserv->modification($modif);
        header('location: Tableau.php');
    } else {
        throw new EmployeServiceException("Informations incorrectes", 1);
        
        $id = $_POST["id"];
        $check = true;
        header("location: modif.php?id=$id&check=$check>");
    };
} catch (EmployeServiceException $e) {
    echo ($e->getMessage());
}
// if ((preg_match("#^1[0-9]{3}#",$_POST["id"])) && (preg_match("#^[a-z]{1,}#i",$_POST["nom"]))) {
// echo "yes ";
// } else {
//     echo "mauvaise infos"; };
