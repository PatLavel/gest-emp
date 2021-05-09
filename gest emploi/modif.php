<?php session_start();
include_once("view/AfficheModifForm.php");


if ($_SESSION['online'] == false) {
    header('location: connection.php');
}

if (isset($_GET["check"])) {
?> <td>Informations Incorectes</td>
<?php
}; 
AfficheModifForm($_GET["id"]);?>