<?php
include_once(__DIR__ . "/../service/EmployeService.php");
include_once(__DIR__ . "/../view/affichage_employes.php");

// Controller

if ($_POST) {
    $employeService = new EmployeService();
    try {
        $data = $employeService->serachByNoemp($_POST['noemp']);
        afficherResultRechercheEmployes($data);
    } catch (EmployeServiceException $e) {
        // if ($e->getCode() == 1064) {
        // $message = "Un problème technique est survenu. Veuillez réessayer ultérieurement.";
        afficherResultRechercheEmployes(null, $e->getMessage());
        // }
    }
} else {
    affiherFormRechercheParReference();
}
