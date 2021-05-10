<?php
include_once("modele/User.php");
class UsersDAO  extends Common
{

    public function getUsers() : array
    {
        
        $bdd = parent::common();
        $stat = $bdd->prepare("SELECT * FROM users ;");
        $stat->execute();
        $result = $stat->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $tabEmps = [];
        foreach ($row as $value) {
            $employes = (new User())->setNom($value["nom"])->setPassword($value["password"])->setAdmin($value["admin"])->setHash($value["hash"]);
            $tabEmps[] = $employes;
        }
        $result->free();
        $bdd->close();
        return $tabEmps;
    }

    public function getAdmin() :array
    {
        $one = 1;
        
        $bdd = parent::common();
        $stat = $bdd->prepare("SELECT * FROM users WHERE admin = ? ;");
        $stat->bind_param("i", $one);
        $stat->execute();
        $result = $stat->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        return $row;
    }
}
