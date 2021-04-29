<?php
session_start();

$bdd = mysqli_init();
mysqli_real_connect($bdd, "localhost", "root", "", "employes");
$resultusers = mysqli_query($bdd, "SELECT * FROM users ;");
$users = mysqli_fetch_all($resultusers, MYSQLI_ASSOC);


if ((preg_match("#^[A-Z]{1,20}$#i",$_POST["user"])) && (preg_match("#^[0-9]{4,20}$#",$_POST["pass"]))) {
    for ($i=0; $i < sizeof($users); $i++) { 
        if ($_POST['user'] == $users[$i]['nom'] && password_verify($_POST['pass'],$users[$i]['hash'])) {
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
?>