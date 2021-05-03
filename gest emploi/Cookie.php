<?php
session_start();

// $bdd = mysqli_init();
// mysqli_real_connect($bdd, "localhost", "root", "", "employes");
// $resultusers = mysqli_query($bdd, "SELECT * FROM users ;");
// $users = mysqli_fetch_all($resultusers, MYSQLI_ASSOC);

function getUsers(){
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "localhost", "root", "", "employes");
    $result = mysqli_query($bdd, "SELECT * FROM users ;");
    // SI c'est nécessaire (CAS DU SELECT)
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($bdd);
    return $data;    
    }
if ((preg_match("#^[A-Z]{1,20}$#i",$_POST["user"])) && (preg_match("#^[0-9]{4,20}$#",$_POST["pass"]))) {
    for ($i=0; $i < sizeof(getUsers()); $i++) { 
        if ($_POST['user'] == getUsers()[$i]['nom'] && password_verify($_POST['pass'],getUsers()[$i]['hash'])) {
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