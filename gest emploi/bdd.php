<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion employes</title>
</head>
<body>
    <table class="table table-striped table-dark">
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>emploi</th>
            <th>superieur</th>
            <th>service</th>
            <th>#</th>
            <th>#</th>
            <th>#</th>
        </tr>
        <?php
            // $bdd = mysqli_init();
            // mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            // $result = mysqli_query($bdd, "SELECT * FROM employes INNER JOIN services ON employes.noserv=services.noserv;");
            // $donnees = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // $resultsup = mysqli_query($bdd, "SELECT DISTINCT sup FROM employes ;");
            // $donneesup = mysqli_fetch_all($resultsup, MYSQLI_ASSOC);
            // $resultcompte = mysqli_query($bdd, "SELECT * FROM compteur WHERE date = CURDATE();");
            // $compteur = mysqli_fetch_all($resultcompte, MYSQLI_ASSOC);
            // $resultusers = mysqli_query($bdd, "SELECT * FROM users WHERE admin = 1;");
            // $users = mysqli_fetch_all($resultusers, MYSQLI_ASSOC);
            
            function getCompteur(){
            $bdd = mysqli_init();
            mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            $result = mysqli_query($bdd, "SELECT * FROM compteur WHERE date = CURDATE();");
            // SI c'est nécessaire (CAS DU SELECT)
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($bdd);
            return $data;    
            }
            function getEmployes(){
            $bdd = mysqli_init();
            mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            $result = mysqli_query($bdd, "SELECT * FROM employes INNER JOIN services ON employes.noserv=services.noserv;");
            // SI c'est nécessaire (CAS DU SELECT)
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($bdd);
            return $data;    
            }
            function getAdmin(){
            $bdd = mysqli_init();
            mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            $result = mysqli_query($bdd, "SELECT * FROM users WHERE admin = 1;");
            // SI c'est nécessaire (CAS DU SELECT)
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($bdd);
            return $data;    
            }
            function getUsers(){
            $bdd = mysqli_init();
            mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            $result = mysqli_query($bdd, "SELECT DISTINCT sup FROM employes ;");
            // SI c'est nécessaire (CAS DU SELECT)
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($bdd);
            return $data;    
            }


            if ($_SESSION['online'] == false) {
                header('location: connection.php');
            }
            
            $compte = 0;
            for ($i=0; $i < sizeof(getCompteur()); $i++) { 
                $compte++;
            };
            for ($i=0; $i < sizeof(getAdmin()); $i++) { 
                if ($_SESSION['User'] == getAdmin()[$i]['nom'] && password_verify($_SESSION['pass'],getAdmin()[$i]['hash']) && getAdmin()[$i]['admin']) {
                    $admin = true;
                    break;
                }
                else{
                    $admin = false;
                };
            };
            
            
            ?><td><?php echo($compte); ?></td>
            <td><?php if ($admin) {echo "<a href='ajouter.php'><button class='btn btn-warning'>ajouter</button></a>";}; ?></td>
            <td><?php echo "<a href='connection.php'><button class='btn btn-warning'>connection</button></a>";  ?></td>
            <td><?php echo "<a href='connection.php?deco=true'><button class='btn btn-warning'>deconnection</button></a>";  ?></td>
            <?php  
            for ($i=0; $i < sizeof(getEmployes()); $i++) {?>
                <tr>
                <td><?php echo getEmployes()[$i]['noemp']; ?></td>
                <td><?php echo (getEmployes()[$i]['nom'].' '.getEmployes()[$i]['prenom']); ?></td>
                <td><?php echo getEmployes()[$i]['emploi']; ?></td>
                <td><?php echo getEmployes()[$i]['sup']; ?></td>
                <td><?php echo getEmployes()[$i]['service']; ?></td> 
                <?php $transfer = getEmployes()[$i]['noemp'];  ?>
                <td><?php echo "<a href='details.php?id=$transfer'><button class='btn btn-warning'>Detail</button></a>"; ?></td>
                <?php
                if ($admin) {
                ?>
                <td><?php echo "<a href='modif.php?id=$transfer'><button class='btn btn-warning'>Modifier</button></a>"; ?></td>
                <?php $direct = false;
                    for ($j=0; $j < sizeof(getUsers()); $j++) { 
                        if (getEmployes()[$i]['noemp'] == getUsers()[$j]['sup']){
                            $direct = true;
                        };
                    }
                    if (!$direct) { ?>
                <td><?php echo "<a href='suprimmer.php?id=$transfer'><button class='btn btn-warning'>Suprimmer</button></a>"; ?></td>
                <?php    
                    }else {
                        ?><td></td><?php
                    } 
                }?> 
                </tr>
            <?php  } 
            ?>
    </table>
                
</body>
</html>