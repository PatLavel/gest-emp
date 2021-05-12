<?php
include_once(__DIR__ . "/../DAO/EmployeDAO.php");



class EmployeService
{

    public function getEmployes()
    {
        $EmpDAO = new EmployeDAO();
        try {
            $dataemp = $EmpDAO->getEmployes();
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }
        return $dataemp;
    }
    public function selectEmp(int $id): Employe
    {
        $EmpDAO = new EmployeDAO();
        try {
            $dataemp = $EmpDAO->selectEmp($id);
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }
        return $dataemp;
    }
    public function getSup(): array
    {
        $EmpDAO = new EmployeDAO();
        try {
            $dataemp = $EmpDAO->getSup();
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }
        return $dataemp;
    }
    public function getDirection()
    {
        $EmpDAO = new EmployeDAO();
        try {
            $dataemp = $EmpDAO->getDirection();
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }
        return $dataemp;
    }
    public function modification(object $modif)
    {
        $EmpDAO = new EmployeDAO();
        try {
            $EmpDAO->modification($modif);
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }
    }

    public function deleteEmp(int $id)
    {
        $EmpDAO = new EmployeDAO();
        try {
            $EmpDAO->deleteEmp($id);
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }
    }

    public function addEmploye(object $ajout)
    {

        $EmpDAO = new EmployeDAO();
        try {
            $EmpDAO->addEmploye($ajout);
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }
    }
}
