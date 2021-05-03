<?php session_start(); 
if ($_SESSION['online'] == false) {
    header('location: connection.php');
}
?>

<?php
if ((preg_match("#^1[0-9]{3}#",$_POST["id"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["nom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["prenom"])) && (preg_match("#^[A-Z]{1,20}$#",$_POST["poste"])) && (preg_match("#^[0-9]{1,}$#i",$_POST["sal"])) && (preg_match("#^[0-9]{1,}$#i",$_POST["comm"])) && (preg_match("#^1[0-9]00$#",$_POST["sup"])) && (preg_match("#^[A-Z]{1,20}$#i",$_POST["service"]))) {
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "localhost", "root", "", "employes");

    function getSingleService(){
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        $result = mysqli_query($bdd, "SELECT * FROM services WHERE service = '".$_POST["service"]."';");
        // SI c'est nécessaire (CAS DU SELECT)
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($bdd);
        return $data;    
        }
    function addEmploye(){
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        mysqli_query($bdd, "INSERT INTO employes VALUES ('".$_POST["id"]."' , '".$_POST["nom"]."', '".$_POST["prenom"]."' , '".$_POST["poste"]."'  , '".$_POST["sup"]."' , '".$date."' , '".$_POST["sal"]."' , '".$_POST["comm"]."' , '".$noserv."' );");
        mysqli_close($bdd);
        }
    function addCompteur(){
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "root", "", "employes");
        mysqli_query($bdd, "INSERT INTO compteur VALUES (CURDATE(),1);");
        mysqli_close($bdd);
        }
    

    $noserv = getSingleService()[0][('noserv')];
    $date = date("Y/m/d");
    // echo ($_POST["id"] . $_POST["nom"] . $_POST["prenom"] . $_POST["poste"]  . $_POST["sup"] . ($date). $_POST["sal"] . $_POST["comm"] . ($noserv));
    addEmploye();
    addCompteur();
    header('location: bdd.php');
} 
else {
    $check = true;
    header ("location: ajouter.php?check=$check>");  };
?>