<?php 
include_once("DAO/serviceDAO.php");

class ServiceService{
    public function getServices()
    {
        $DAO = new ServiceDAO();
        $data = $DAO->getServices( );
        return $data;
    }

    public function getSingleService(string $serv)
    {
        $DAO = new ServiceDAO();
        $data = $DAO->getSingleService($serv);
        return $data;
    }
}
