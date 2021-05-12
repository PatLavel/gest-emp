<?php 
include_once(__DIR__."/../DAO/serviceDAO.php");

class ServiceService{
    public function getServices()
    {
        $DAO = new ServiceDAO();
        try{
        $data = $DAO->getServices( );
        }catch (ServiceDAOException $e) {
            throw new ServiceServiceException($e->getMessage(), $e->getCode());
        }
        return $data;
    
    }

    public function getSingleService(string $serv)
    {
        $DAO = new ServiceDAO();
        try{
        $data = $DAO->getSingleService($serv);
        }catch (ServiceDAOException $e) {
        throw new ServiceServiceException($e->getMessage(), $e->getCode());
    }
    return $data;
    }     
}