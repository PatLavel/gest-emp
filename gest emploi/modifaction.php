<?php
if ((preg_match("#^1[0-9]{3}#",$_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["poste"])) && (preg_match("#^1[0-9]00#",$_POST["sup"])) && (preg_match("#^[a-z]{1,20}$#i",$_POST["service"]))) {
    
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "localhost", "root", "", "employes");
    $serv = $_POST["service"];
    $resultserv = mysqli_query($bdd, "SELECT * FROM services WHERE service = '".$_POST["service"]."';");
    $donneeserv = mysqli_fetch_all($resultserv, MYSQLI_ASSOC);
    $noserv = $donneeserv[0][('noserv')];
    mysqli_query($bdd, "UPDATE employes SET nom = '".$_POST["nom"]."' , prenom = '".$_POST["prenom"]. "' , emploi = '".$_POST["poste"]. "'  , sup = '".$_POST["sup"]. "' , noserv = '".($noserv-1)."' 
    WHERE noemp = '".$_POST["id"]."' ;");
    header('location: bdd.php');
} else {
    $id = $_POST["id"];
    $check = true;
    header ("location: modif.php?id=$id&check=$check>"); ?>

<?php };
?>
<?php
// if ((preg_match("#^1[0-9]{3}#",$_POST["id"])) && (preg_match("#^[a-z]{1,}#i",$_POST["nom"]))) {
// echo "yes ";
// } else {
//     echo "mauvaise infos"; };
?>
