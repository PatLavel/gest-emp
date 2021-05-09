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
    public function selectEmp(int $id) : Employe
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
    public function modification(string $nom, string $prenom, string $poste, int $sup, int $noserv, int $id)
    {
        $EmpDAO = new EmployeDAO();
        $EmpDAO->modification($nom,  $prenom,  $poste,  $sup,  $noserv,  $id);

    }

    public function deleteEmp(int $id)
    {
        $EmpDAO = new EmployeDAO();
        $EmpDAO->deleteEmp($id);
    }
    
    public function addEmploye(int $id, string $nom, string $prenom, string $poste, int $sup, int $sal, int $comm, int $noserv)
    {
        
        $EmpDAO = new EmployeDAO();
        $EmpDAO->addEmploye( $id,  $nom,  $prenom,  $poste,  $sup,  $sal,  $comm, $noserv);
    }
}
