<?php
include_once(__DIR__ . "DAO/EmployeDAO.php");
include_once(__DIR__ . "/../modele/Employe.php");
class serv
{

    public function getEmployes(int $WHAT)
    {
        $EmpDAO = new EmployeDAO();
        $dataemp = $EmpDAO->getEmployes( $WHAT);
        return $dataemp;
    }
    public function selectEmp(int $id)
    {
        $EmpDAO = new EmployeDAO();
        $dataemp = $EmpDAO->selectEmp($id);
        return $dataemp;
    }
}
//__DIR__