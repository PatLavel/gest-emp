<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        
            $bdd = mysqli_init();
            mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            $result = mysqli_query($bdd, "SELECT *  FROM employes ;") or die(mysql_error());
            $donnees = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $resultserv = mysqli_query($bdd, "SELECT *  FROM services ;") or die(mysql_error());
            $donneeserv = mysqli_fetch_all($resultserv, MYSQLI_ASSOC);
            for ($i=0; $i < sizeof($donnees); $i++) {?>
                <tr>
                <td><?php echo $donnees[$i]['noemp']; ?></td>
                <td><?php echo ($donnees[$i]['nom'].' '.$donnees[$i]['prenom']); ?></td>
                <td><?php echo $donnees[$i]['emploi']; ?></td>
                <td><?php echo $donnees[$i]['sup']; ?></td>
                <td><?php echo $donneeserv[$donnees[$i]['noserv']]['service']; ?></td> 
                <?php $transfer = $donnees[$i]['noemp'];  ?>
                <td><?php echo "<a href='details.php?id=$transfer'><button class='btn btn-warning'>Detail</button></a>"; ?></td>
                <td><?php echo "<a href='modif.php?id=$transfer'><button class='btn btn-warning'>Modifier</button></a>"; ?></td>
                <td><?php echo "<a href='suprimmer.php?id=$transfer'><button class='btn btn-warning'>Suprimmer</button></a>"; ?></td>
                </tr>
            <?php  } 
            mysqli_free_result($result); ?>
    </table>
                <?php echo "<a href='ajouter.php'><button class='btn btn-warning'>ajouter</button></a>"; ?>

</body>
</html>