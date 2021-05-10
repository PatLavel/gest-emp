<?php

include_once(__DIR__ . "/../model/Employe.php");
require_once(__DIR__ . "/../exception/EmployeDAOException.php");

class EmployeDAO
{

    function serachByNoemp(int $noemp): Employe
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $mysqli = new mysqli("localhost", "root", "", "gestion_employes");
            $sql = "sect * from emp where noemp = " . $noemp . ";";
            $rs = $mysqli->query($sql);
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1064) {
                $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement.";
            } else {
                $message = $e->getMessage();
            }
            throw new EmployeDAOException($message);
        }
        $employe = (new Employe())->setNoemp($data[0]["NOEMP"])->setNom($data[0]["NOM"]);
        return $employe;
    }

    function serachAll(): array
    {
        $mysqli = new mysqli("localhost", "root", "", "gestion_employes");
        $sql = "select * from emp;";
        $rs = $mysqli->query($sql);
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $employes = [];
        foreach ($data as $value) {
            $employes[] = (new Employe())->setNoemp($value[0]["NOEMP"])->setNom($value[0]["NOM"]);
        }

        $rs->free();
        $mysqli->close();
        return $employes;
    }
}
