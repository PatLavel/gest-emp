<?php session_start();
include("service/EmployeService.php");
include("service/ServiceService.php");

$servserv= new ServiceService();
$dataserv =$servserv -> getSingleService($_POST["service"]);
$empserv= new EmployeService();


if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
if ((preg_match("#^1[0-9]{3}#", $_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["poste"])) && (preg_match("#^[0-9]{1,}$#i", $_POST["sal"])) && (preg_match("#^[0-9]{1,}$#i", $_POST["comm"])) && (preg_match("#^1[0-9]00$#", $_POST["sup"])) && (preg_match("#^[A-Z]{1,20}$#i", $_POST["service"]))) {
    
    $empserv -> addEmploye($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["poste"], $_POST["sup"], $_POST["sal"], $_POST["comm"], $dataserv[0]["noserv"]);
    
    
    
    function addCompteur()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $bdd = new mysqli("localhost", "root", "", "employes");
        //$bdd ->query("INSERT INTO compteur VALUES (CURDATE(),1);")  ;
        $stat = $bdd->prepare("DELETE FROM employes WHERE noemp = ? ;");
        $stat->bind_param("i", $delete);
        $stat->execute();
        $bdd->close();
    }


    //addEmploye();
    addCompteur();
    header('location: bdd.php');
} else {
    $check = true;
    header("location: ajouter.php?check=$check>");
};
?>