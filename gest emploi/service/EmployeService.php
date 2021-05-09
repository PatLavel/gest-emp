<?php
include_once("DAO/EmployeDAO.php");



class EmployeService
{

    public function getEmployes()
    {
        $EmpDAO = new EmployeDAO();
        $dataemp = $EmpDAO->getEmployes();
        return $dataemp;
    }
    public function selectEmp(int $id): Employe
    {
        $EmpDAO = new EmployeDAO();
        $dataemp = $EmpDAO->selectEmp($id);
        return $dataemp;
    }
    public function getSup(): array
    {
        $EmpDAO = new EmployeDAO();
        $dataemp = $EmpDAO->getSup();
        return $dataemp;
    }
    public function getDirection()
    {
        $EmpDAO = new EmployeDAO();
        $dataemp = $EmpDAO->getDirection();
        return $dataemp;
    }
    public function modification(object $modif)
    {
        $EmpDAO = new EmployeDAO();
        $EmpDAO->modification($modif);
    }

    public function deleteEmp(int $id)
    {
        $EmpDAO = new EmployeDAO();
        $EmpDAO->deleteEmp($id);
    }

    public function addEmploye(object $ajout)
    {

        $EmpDAO = new EmployeDAO();
        $EmpDAO->addEmploye($ajout);
    }
}
