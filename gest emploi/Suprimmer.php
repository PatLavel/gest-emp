<?php session_start(); 

if ($_SESSION['online'] == false) {
        header('location: connection.php');
    }
?>
<?php
        $delete = $_GET["id"];
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        mysqli_query($bdd, "DELETE FROM employes WHERE noemp = $delete ;") ;
        header('location: bdd.php');
        mysqli_free_result($result);
        ?>