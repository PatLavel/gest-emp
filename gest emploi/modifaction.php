<?php session_start();
include("service/EmployeService.php");
include("service/ServiceService.php");
if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
if ((preg_match("#^1[0-9]{3}#", $_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["poste"])) && (preg_match("#^1[0-9]00#", $_POST["sup"])) && (preg_match("#^[a-z]{1,20}$#i", $_POST["service"]))) {
    $empserv = new EmployeService;
    $servserv = new ServiceService;
   
    $dataserv = $servserv->getSingleService($_POST["service"]);
    $empserv->modification(
        $_POST["nom"], 
        $_POST["prenom"], 
        $_POST["poste"], 
        $_POST["sup"], 
        $dataserv[0]['noserv'], 
        $_POST["id"]);
    header('location: bdd.php');
} else {
    $id = $_POST["id"];
    $check = true;
    header("location: modif.php?id=$id&check=$check>"); ?>

<?php };
?>
<?php
// if ((preg_match("#^1[0-9]{3}#",$_POST["id"])) && (preg_match("#^[a-z]{1,}#i",$_POST["nom"]))) {
// echo "yes ";
// } else {
//     echo "mauvaise infos"; };
?>
