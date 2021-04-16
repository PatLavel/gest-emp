<?php
        $delete = $_GET["id"];
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        mysqli_query($bdd, "DELETE FROM employes WHERE noemp = $delete ;") or die(mysql_error());
        header('location: bdd.php');
        mysqli_free_result($result);
        ?>