<?php session_start(); 
if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
?>
<?php
if ((preg_match("#^1[0-9]{3}#",$_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["poste"])) && (preg_match("#^1[0-9]00#",$_POST["sup"])) && (preg_match("#^[a-z]{1,20}$#i",$_POST["service"]))) {
    $serv = $_POST["service"];
    function getserv(){
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        $result = mysqli_query($bdd, "SELECT * FROM services WHERE service = '".$_POST["service"]."';");
        // SI c'est nécessaire (CAS DU SELECT)
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($bdd);
        return $data;    
        }
    function modification(){
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        mysqli_query($bdd, "UPDATE employes SET nom = '".$_POST["nom"]."' , prenom = '".$_POST["prenom"]. "' , emploi = '".$_POST["poste"]. "'  , sup = '".$_POST["sup"]. "' , noserv = '".($noserv-1)."' 
        WHERE noemp = '".$_POST["id"]."' ;");
        mysqli_close($bdd); 
        }

    // $bdd = mysqli_init();
    // mysqli_real_connect($bdd, "localhost", "root", "", "employes");
    // $resultserv = mysqli_query($bdd, "SELECT * FROM services WHERE service = '".$_POST["service"]."';");
    // $donneeserv = mysqli_fetch_all($resultserv, MYSQLI_ASSOC);

    $noserv = getserv()[0][('noserv')];
    modification();
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
