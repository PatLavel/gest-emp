<?php

include_once(__DIR__ . "/../model/Employe.php");
include_once(__DIR__ . "/../dao/EmployeDAO.php");
include_once(__DIR__ . "/../exception/EmployeDAOException.php");
include_once(__DIR__ . "/../exception/EmployeServiceException.php");

class EmployeService
{

    public function serachByNoemp(int $noemp): Employe
    {

        $employeDao = new EmployeDAO();
        try {
            $employe = $employeDao->serachByNoemp($noemp);
        } catch (EmployeDAOException $e) {
            throw new EmployeServiceException($e->getMessage(), $e->getCode());
        }

        return $employe;
    }

    // Devrait être dans UserService
    // public function inscription(User $user): void
    // {
    //     $mdpHash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
    //     $user->setPassword($mdpHash);

    //     $userDAO = new UserDAO();
    //     $userDAO->inscription($user);
    // }
}
