<?php
session_start();
include("service/UsersService.php");

$userserv = new UsersService;
$users = $userserv->getUsers();
//var_dump($users);

if ((preg_match("#^[A-Z]{1,20}$#i",$_POST["user"])) && (preg_match("#^[0-9]{4,20}$#",$_POST["pass"]))) {
    for ($i=0; $i < sizeof($users); $i++) { 
        if ($_POST['user'] == $users[$i]->getNom() && password_verify($_POST['pass'],$users[$i]->getHash())) {
            $_SESSION['User'] = $_POST['user'];
            $_SESSION['pass'] = $_POST['pass'];
            $_SESSION['time'] = time();
            $_SESSION['online'] = true;
            header('location: bdd.php');

            break;
        }
        header ("location: connection.php?check=2>");
    };
} else {
    $check = true;
    header ("location: connection.php?check=1>");  
};
