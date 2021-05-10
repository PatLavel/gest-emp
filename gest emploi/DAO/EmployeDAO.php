<?php
include_once("modele/Employe.php");
include_once("DAO/Common.php");
class EmployeDAO extends Common
{

    public function getEmployes()
    {
        $bdd = parent::common();
        $stat = $bdd->prepare("SELECT * FROM employes INNER JOIN services ON employes.noserv=services.noserv;");
        $stat->execute();
        $result = $stat->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $tabEmps = [];
        foreach ($row as $value) {
            $employes = (new Employe())->setNoemp($value["noemp"])->setNom($value["nom"])->setPrenom($value["prenom"])->setEmploi($value["emploi"])->setSup($value["sup"])->setEmbauche($value["embauche"])->setSal($value["sal"])->setCom($value["comm"])->setNoserv($value["noserv"]);
            $tabEmps[] = $employes;
        }
        $result->free();
        $bdd->close();
        return $tabEmps;
    }
    public function modification(object $modif)
    {
        
        $bdd = parent::common();
        $stat = $bdd->prepare("UPDATE employes SET nom = ? , prenom = ? , emploi = ?  , sup = ? , noserv = ? WHERE noemp = ? ;");
        $stat->bind_param("ssssii", $modif->getNom(), $modif->getPrenom(), $modif->getEmploi(), $modif->getSup(), $modif->getnoserv(), $modif->getNoemp());
        $stat->execute();
        $bdd->close();
    }

    public function selectEmp(int $id): Employe
    {
        
        $bdd = parent::common();
        $stat = $bdd->prepare("SELECT *  FROM employes WHERE noemp = ?;");
        $stat->bind_param("i", $id);
        $stat->execute();
        $result = $stat->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $employe = (new Employe())->setNoemp($data[0]["noemp"])->setNom($data[0]["nom"])->setPrenom($data[0]["prenom"])->setEmploi($data[0]["emploi"])
            ->setSup($data[0]["sup"])->setEmbauche($data[0]["embauche"])->setSal($data[0]["sal"])->setCom($data[0]["comm"])->setNoserv($data[0]["noserv"]);
        $result->free();
        $bdd->close();
        return $employe;
    }
    public function getDirection()
    {
        
        $bdd = parent::common();
        $stat = $bdd->prepare("SELECT noemp, nom, prenom FROM employes WHERE emploi = 'DIRECTEUR' OR emploi = 'PRESIDENT' ;");
        //$stat->bind_param("ss",'DIRECTEUR', 'PRESIDENT');
        $stat->execute();
        $result = $stat->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $direction = (new Employe())->setNoemp($row[0]["noemp"])->setNom($row[0]["nom"])->setPrenom($row[0]["prenom"]);
        $result->free();
        $bdd->close();
        return $row;
    }
    public function deleteEmp(int $id)
    {
        
        $bdd = parent::common();
        $stat = $bdd->prepare("DELETE FROM employes WHERE noemp = ? ;");
        $stat->bind_param("i", $id);
        $stat->execute();
        $bdd->close();
    }
    public function getSup(): array
    {
        
        $bdd = parent::common();
        $stat = $bdd->prepare("SELECT DISTINCT sup FROM employes ;");
        $stat->execute();
        $result = $stat->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        return $row;
    }
    public function addEmploye(object $ajout)
    {
        var_dump($ajout);
        $date = date("Y/m/d");
        
        $bdd = parent::common();
        $stat = $bdd->prepare("INSERT INTO employes VALUES (? , ? , ? , ? , ? , ? , ? , ? , ?);");
        $stat->bind_param(
            "isssisiii",
            $ajout->getNoemp(),
            $ajout->getNom(),
            $ajout->getPrenom(),
            $ajout->getEmploi(),
            $ajout->getSup(),
            $date,
            $ajout->getSal(),
            $ajout->getCom(),
            $ajout->getNoserv()
        );
        $stat->execute();
        $bdd->close();
        $ajout->getNom();
    }
}
