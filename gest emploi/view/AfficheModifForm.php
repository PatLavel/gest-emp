<?php
include_once(__DIR__ . "/../view/AfficheHTML.php");
include_once(__DIR__ . "/../service/EmployeService.php");
include_once(__DIR__ . "/../service/ServiceService.php");

function AfficheModifForm($dataserv,$datasup,$dataemp)
{

    if (isset($_GET["id"])) {

        afficherHeadHtml();


?>
        <body>
            <?php if (isset($_GET["check"])) {
            ?> <td>Informations Incorectes</td>
            <?php
            }; ?>
            <form action="modifaction.php" method="POST">

                <input type="number" class="form-control" name="id" placeholder=" ID" value="<?php echo $dataemp->getNoemp('noemp') ?>" hidden>
                <td>Votre nouveau nom</td>
                <input type="text" class="form-control" name="nom" placeholder="nouveau nom" value="<?php echo $dataemp->getNom('nom') ?>">
                <td>Votre nouveau prenom</td>
                <input type="text" class="form-control" name="prenom" placeholder="nouveau prenom" value="<?php echo $dataemp->getPrenom('prenom') ?>">
                <td>Votre poste</td>
                <input type="text" class="form-control" name="poste" placeholder="nouve poste" value="<?php echo $dataemp->getEmploi('emploi') ?>">
                <td>Votre superieur</td>
                <select name="sup">
                    <?php
                    for ($i = 0; $i < sizeof($datasup); $i++) {
                    ?><option value="<?php echo $datasup[$i]['noemp']; ?>"><?php echo ($datasup[$i]['nom'] . ' ' . $datasup[$i]['prenom']); ?></option><?php
                                                                                                                                                    } ?>
                </select>
                <td>Votre service</td>
                <select name="service">
                    <?php

                    for ($i = 0; $i < sizeof($dataserv); $i++) {
                    ?><option value="<?php echo $dataserv[$i]['service']; ?>"><?php echo $dataserv[$i]['service']; ?></option><?php
                                                                                                                            } ?>

                </select>
                <input type="submit" class="btn btn-success" value="Soumettre">
            </form>
        </body>

        </html>

<?php  } else {
        header("location: bdd.php");
    };
}; ?>