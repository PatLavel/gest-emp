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
    <title>Modif</title></head>
<body>
    <?php 
    if (isset($_GET["check"])) {
        ?> <td>Informations Incorectes</td> <?php 
    };
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        // $bdd = mysqli_init();
        // mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        // $result = mysqli_query($bdd, "SELECT *  FROM employes WHERE noemp = $id;") or die(mysql_error());
        // $donnees = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // $resultsup = mysqli_query($bdd, "SELECT *  FROM employes WHERE emploi = 'DIRECTEUR' OR emploi = 'president';") or die(mysql_error());
        // $donneesup = mysqli_fetch_all($resultsup, MYSQLI_ASSOC);
        // mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        // $resultserv = mysqli_query($bdd, "SELECT *  FROM services ;") or die(mysql_error());
        // $donneeserv = mysqli_fetch_all($resultserv, MYSQLI_ASSOC);
    
    
        function selectUser(){
            $bdd = mysqli_init();
            mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            $result = mysqli_query($bdd, "SELECT *  FROM employes WHERE noemp = $id;");
            // SI c'est nécessaire (CAS DU SELECT)
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($bdd);
            return $data;    
            }
        function getDirection(){
            $bdd = mysqli_init();
            mysqli_real_connect($bdd, "localhost", "root", "", "employes");
            $result = mysqli_query($bdd, "SELECT *  FROM employes WHERE noemp = $id;");
            // SI c'est nécessaire (CAS DU SELECT)
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($bdd);
            return $data;    
            }
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
    };
    ?>

    

    <form action="modifaction.php" method="POST">
        <input type="number" class="form-control" name="id" placeholder=" ID"  value="<?php echo selectUser()[0]['noemp']?>" hidden >
        <td>Votre nouveau nom</td>
        <input type="text" class="form-control" name="nom" placeholder="nouveau nom"  value="<?php echo selectUser()[0]['nom']?>">
        <td>Votre nouveau prenom</td>
        <input type="text" class="form-control" name="prenom" placeholder="nouveau prenom"  value="<?php echo selectUser()[0]['prenom']?>">
        <td>Votre poste</td>
        <input type="text" class="form-control" name="poste" placeholder="nouve poste"  value="<?php echo selectUser()[0]['emploi']?>" >
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
      <script>            
            if (isset($_POST['submit'])) {
                echo "GeeksforGeeks";
            }
      </script>
</body>
</html>
<!-- if ($data["serv"] == $tabserv[$i][serv]) {echo "selected";} 
      if ((preg_match("#^1[0-9]{3}#",$_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["poste"])) && (preg_match("#^1[0-9]00#",$_POST["sup"])) && (preg_match("#^[a-z]{1,20}$#i",$_POST["service"]))) {
        
        }-->