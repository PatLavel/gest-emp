<?php session_start();
include_once("view/AfficheDetail.php");
if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
AfficheDetail($_GET["id"]);