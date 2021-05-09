<?php
include_once(__DIR__ . "/../view/AfficheHTML.php");
include_once(__DIR__ . "/../service/EmployeService.php");
include_once(__DIR__ . "/../service/UsersService.php");
include_once(__DIR__ . "/../service/serviceService.php");


function AfficheTableauEmp()
{
    $Empserv = new EmployeService();
    $Usersserv = new UsersService();
    $dataemp = $Empserv->getEmployes();
    $datasup = $Empserv->getSup();
    $datausers = $Usersserv->getAdmin();
    afficherHeadHtml();

?>

    <body>
        <?php
        // function getCompteur()
        // {
        //     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        //     $bdd = new mysqli("localhost", "root", "", "employes");
        //     $stat = $bdd->prepare("SELECT * FROM compteur WHERE date = CURDATE();");
        //     $stat->execute();
        //     $result = $stat->get_result();
        //     $row = $result->fetch_all(MYSQLI_ASSOC);
        //     $result->free();
        //     $bdd->close();
        //     return $row;
        // }

        if ($_SESSION['online'] == false) {
            header('location: connection.php');
        }
        // $compte = 0;
        // for ($i = 0; $i < sizeof(getCompteur()); $i++) {
        //     $compte++;
        // };
        for ($i = 0; $i < sizeof($datausers); $i++) {
            if ($_SESSION['User'] == $datausers[$i]['nom'] && password_verify($_SESSION['pass'], $datausers[$i]['hash']) && $datausers[$i]['admin']) {
                $admin = true;
                break;
            } else {
                $admin = false;
            };
        };
        ?>
        <td><?php // echo ($compte); 
            ?></td>
        <td><?php if ($admin) {
                echo "<a href='ajouter.php'><button class='btn btn-success'>ajouter</button></a>";
            }; ?></td>
        <td><?php echo "<a href='connection.php'><button class='btn btn-success'>connection</button></a>";  ?></td>
        <td><?php echo "<a href='connection.php?deco=true'><button class='btn btn-success'>deconnection</button></a>";  ?></td>

        <table class="table table-striped table-dark">
            <tr>
                <th>ID</th>
                <th>nom</th>
                <th>emploi</th>
                <th>superieur</th>
                <th>service</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
            </tr><?php
                    for ($i = 0; $i < sizeof($dataemp); $i++) { ?>
                <tr>
                    <td><?php echo $dataemp[$i]->getNoemp(); ?></td>
                    <td><?php echo ($dataemp[$i]->getNom() . ' ' . $dataemp[$i]->getPrenom()); ?></td>
                    <td><?php echo $dataemp[$i]->getEmploi(); ?></td>
                    <td><?php echo $dataemp[$i]->getSup(); ?></td>
                    <td><?php echo $dataemp[$i]->getNoserv(); ?></td>
                    <?php $transfer = $dataemp[$i]->getNoemp();  ?>
                    <td><?php echo "<a href='details.php?id=$transfer'><button class='btn btn-warning'>Detail</button></a>"; ?></td>
                    <?php
                        if ($admin) {
                    ?>
                        <td><?php echo "<a href='modif.php?id=$transfer'><button class='btn btn-warning'>Modifier</button></a>"; ?></td>
                        <?php $direct = false;
                            for ($j = 0; $j < sizeof($datasup); $j++) {
                                if ($dataemp[$i]->getNoemp() == $datasup[$j]['sup']) {
                                    $direct = true;
                                };
                            }
                            if (!$direct) { ?>
                            <td><?php echo "<a href='suprimmer.php?id=$transfer'><button class='btn btn-warning'>Suprimmer</button></a>"; ?></td>
                        <?php
                            } else {
                        ?><td></td><?php
                                }
                            } ?>
                </tr>
            <?php  }
            ?>
        </table>
    </body><?php
        }; ?>