<?php 
include_once(__DIR__."/../view/AfficheHTML.php");
include_once(__DIR__."/../service/EmployeService.php");


function AfficheDetail($data)
{



afficherHeadHtml();
?>


<body>
    <table class="table table-striped table-dark">
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>prenom</th>
            <th>emploi</th>
            <th>superieur</th>
            <th>embauche</th>
            <th>Salaire</th>
            <th>commision</th>
            <th>service</th>
        </tr>

        <tr>
            <?php     ?>

            <td><?php print_r($data->getNoemp()); ?></td>
            <td><?php print_r($data->getNom()); ?></td>
            <td><?php print_r($data->getPrenom()); ?></td>
            <td><?php print_r($data->getEmploi()); ?></td>
            <td><?php print_r($data->getSup()); ?></td>
            <td><?php print_r($data->getEmbauche()); ?></td>
            <td><?php print_r($data->getSal()); ?></td>
            <td><?php print_r($data->getCom()); ?></td>
            <td><?php print_r($data->getNoserv()); ?></td>
        </tr>
        <td><?php echo "<a href='bdd.php'><button class='btn btn-warning'>retour</button></a>"; ?></td>

    </table>
</body><?php
};?>