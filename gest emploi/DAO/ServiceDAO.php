<?php
include_once(__DIR__."/../modele/Service.php");
class ServiceDAO
{
    public function getServices()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $bdd = new mysqli("localhost", "root", "", "employes");
        $result = $bdd->query("SELECT *  FROM services ;");
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $data = (new Service())->setNoserv($row[0]["noserv"])->setService($row[0]["service"])->setVille($row[0]["ville"]);
        $result->free();
        $bdd->close();
        return $row;
    }

    public function getSingleService(string $serv)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $bdd = new mysqli("localhost", "root", "", "employes");
        $stat = $bdd->prepare("SELECT * FROM services WHERE service = ?;");
        $stat->bind_param("s", $serv);
        $stat->execute();
        $result = $stat->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);
        //$data = (new Service())->setNoserv($row[0]["noserv"])->setService($row[0]["service"])->setVille($row[0]["ville"]);
        
        $result->free();
        $bdd->close();
        return $row;
    }
}
