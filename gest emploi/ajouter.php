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
    <title>ajout</title></head>
<body>
    <?php 
        function getService(){
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        $result = mysqli_query($bdd, "SELECT *  FROM services ;");
        // SI c'est nécessaire (CAS DU SELECT)
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($bdd);
        return $data;    
        }
        function getDirection(){
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        $result = mysqli_query($bdd, "SELECT *  FROM employes WHERE emploi = 'DIRECTEUR' OR emploi = 'president';");
        // SI c'est nécessaire (CAS DU SELECT)
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($bdd);
        return $data;    
        }
        
        if (isset($_GET["check"])) {
            ?> <td>Informations Incorectes</td> <?php }; ?>


    <form action="ajoutaction.php" method="POST">
        <td>Votre identifiant</td>
        <input type="number" class="form-control" name="id" placeholder=" ID"  value=""  >
        <td>Votre nom</td>
        <input type="text" class="form-control" name="nom" placeholder="nouveau nom"  value="">
        <td>Votre prenom</td>
        <input type="text" class="form-control" name="prenom" placeholder="nouveau prenom"  value="">
        <td>Votre poste</td>
        <input type="text" class="form-control" name="poste" placeholder="nouve poste"  value="" >
        <td>Votre salaire</td>
        <input type="text" class="form-control" name="sal" placeholder="10000"  value="" >
        <td>Votre commision</td>
        <input type="text" class="form-control" name="comm" placeholder="0"  value="" >
        <td>Votre superieur</td>
        <select name="sup">
            <?php
            
            for ($i = 0;$i<sizeof(getDirection());$i++ ){
                ?><option value="<?php echo getDirection()[$i]['noemp']; ?>"><?php echo (getDirection()[$i]['nom'].' '.getDirection()[$i]['prenom']); ?></option><?php
            }?>
            
        </select>
        <td>Votre service</td>
        <select name="service">
            <?php
            for ($i = 0;$i<sizeof(getService());$i++ ){
                ?><option value="<?php echo getService()[$i]['service']; ?>"><?php echo getService()[$i]['service']; ?></option><?php
            }?>
            
        </select>
        <input type="submit" class="btn btn-success" value="Soumettre">
      </form> 
</body>
</html>