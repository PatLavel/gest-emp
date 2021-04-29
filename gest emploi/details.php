<?php session_start(); 
if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">        
        <title>Document</title>
</head>
<body>
<table class="table table-striped table-dark">
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>prenom</th>
            <th>emploi</th>
            <th>superieur</th>
            <th>embauche</th>
            <th>Salaire</th>
            <th>commision</th>
            <th>service</th>
        </tr>


            
        <?php
        $id = $_GET["id"];
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        $result = mysqli_query($bdd, "SELECT *  FROM employes WHERE noemp = $id;") or die(mysql_error());
        $donnees = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
        <tr>
        <td><?php echo $donnees[0]['noemp']; ?></td>
        <td><?php echo $donnees[0]['nom']; ?></td>
        <td><?php echo $donnees[0]['prenom']; ?></td>
        <td><?php echo $donnees[0]['emploi']; ?></td>
        <td><?php echo $donnees[0]['sup']; ?></td>
        <td><?php echo $donnees[0]['embauche']; ?></td>
        <td><?php echo $donnees[0]['sal']; ?></td>
        <td><?php echo $donnees[0]['comm']; ?></td>
        <td><?php echo $donnees[0]['noserv']; ?></td>
        </tr>
        <td><?php echo "<a href='bdd.php'><button class='btn btn-warning'>retour</button></a>"; ?></td>
        <?php  
        mysqli_free_result($result); ?>
    </table>
</body>
</html>