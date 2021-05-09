<?php 
include_once(__DIR__."/../view/AfficheHTML.php");
include_once(__DIR__."/../service/EmployeService.php");
include_once(__DIR__."/../service/ServiceService.php");



function AfficheAjoutForm(){
$empserv = new EmployeService();
$dataemp = $empserv->getDirection();
$servserv = new ServiceService();
$dataserv = $servserv->getServices();
afficherHeadHtml();
    ?>

<body>
<?php
if (isset($_GET["check"])) {
?> <td>Informations Incorectes</td> <?php }; ?>


<form action="ajoutaction.php" method="POST">
    <td>Votre identifiant</td>
    <input type="number" class="form-control" name="id" placeholder=" ID" value="">
    <td>Votre nom</td>
    <input type="text" class="form-control" name="nom" placeholder="nouveau nom" value="">
    <td>Votre prenom</td>
    <input type="text" class="form-control" name="prenom" placeholder="nouveau prenom" value="">
    <td>Votre poste</td>
    <input type="text" class="form-control" name="poste" placeholder="nouve poste" value="">
    <td>Votre salaire</td>
    <input type="text" class="form-control" name="sal" placeholder="10000" value="">
    <td>Votre commision</td>
    <input type="text" class="form-control" name="comm" placeholder="0" value="">
    <td>Votre superieur</td>
    <select name="sup">
        <?php

        for ($i = 0; $i < sizeof($dataemp); $i++) {
        ?><option value="<?php echo $dataemp[$i]['noemp']; ?>"><?php echo ($dataemp[$i]['nom'] . ' ' . $dataemp[$i]['prenom']); ?></option><?php
                                                                                                                                        } ?>

    </select>
    <td>Votre service</td>
    <select name="service">
        <?php
        for ($i = 0; $i < sizeof($dataserv); $i++) {
        ?><option value="<?php echo $dataserv[$i]['service']; ?>"><?php echo $dataserv[$i]['service']; ?></option><?php
                                                                                                                } ?>

    </select>
    </br>
    </br>
    <input type="submit" class="btn btn-success" value="Soumettre">
    
</form>
<td><?php echo "<a href='bdd.php'><button class='btn btn-success'>retour</button></a>"; ?></td>

</body>

</html>
<?php }; ?>