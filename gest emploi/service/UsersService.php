<?php 
include_once("DAO/UsersDAO.php");

class UsersService{
    public function getUsers()
    {
        $servDAO = new UsersDAO();
        $dataemp = $servDAO->getUsers( );
        return $dataemp;
    }

    public function getAdmin()
    {
        $servDAO = new UsersDAO();
        $dataemp = $servDAO->getAdmin( );
        return $dataemp;
    }
}