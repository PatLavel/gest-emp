<?php
include_once("modele/User.php");
class UsersDAO
{

    public function getUsers() : array
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $bdd = new mysqli("localhost", "root", "", "employes");
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
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $bdd = new mysqli("localhost", "root", "", "employes");
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
