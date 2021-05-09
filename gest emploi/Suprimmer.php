<?php session_start();
include("service/EmployeService.php");

if ($_SESSION['online'] == false) {
    header('location: connection.php');
}

if (isset($_GET["id"])) {
$del = new EmployeService;
$del-> deleteEmp($_GET["id"]);
}
header('location: bdd.php');
// function delete()
// {
//     $delete = $_GET["id"];
//     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//     $bdd = new mysqli("localhost", "root", "", "employes");

//     $stat = $bdd->prepare("DELETE FROM employes WHERE noemp = ? ;");
//     $stat->bind_param("i", $delete);
//     $stat->execute();

//     $bdd->close();
// }
// delete();
?>