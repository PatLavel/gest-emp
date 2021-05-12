<?php session_start();
include_once(__DIR__."/../service/EmployeService.php");
include_once(__DIR__."/../service/ServiceService.php");

$servserv= new ServiceService();
$dataserv =$servserv -> getSingleService($_POST["service"]);
$empserv= new EmployeService();
$ajout = (new Employe())->setNoemp($_POST["id"])->setNom($_POST["nom"])
        ->setPrenom($_POST["prenom"])->setEmploi($_POST["poste"])
        ->setSup($_POST["sup"])->setSal($_POST["sup"])->setCom($_POST["sup"])
        ->setNoserv($dataserv[0]['noserv']);


if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
if ((preg_match("#^1[0-9]{3}#", $_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#", $_POST["poste"])) && (preg_match("#^[0-9]{1,}$#i", $_POST["sal"])) && (preg_match("#^[0-9]{1,}$#i", $_POST["comm"])) && (preg_match("#^1[0-9]00$#", $_POST["sup"])) && (preg_match("#^[A-Z]{1,20}$#i", $_POST["service"]))) {
    
    $empserv -> addEmploye($ajout);
    
    
    
    // function addCompteur()
    // {
    //     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    //     $bdd = new mysqli("localhost", "root", "", "employes");
    //     //$bdd ->query("INSERT INTO compteur VALUES (CURDATE(),1);")  ;
    //     $stat = $bdd->prepare("DELETE FROM employes WHERE noemp = ? ;");
    //     $stat->bind_param("i", $delete);
    //     $stat->execute();
    //     $bdd->close();
    // }


    // //addEmploye();
    // addCompteur();
    header('location: Tableau.php');
} else {
    $check = true;
    header("location: ajouter.php?check=$check>");
};
?>