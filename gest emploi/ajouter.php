<?php session_start();
include("view/AfficheAjoutForm.php");



if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
AfficheAjoutForm();
?>