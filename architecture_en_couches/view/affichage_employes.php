<?php

include_once(__DIR__ . "/../model/Employe.php");
include_once(__DIR__ . "/affichage_commun.php");

function afficherResultRechercheEmployes(?Employe $employeTrouve, string $message = "")
{
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    afficherHeadHtml("../css/style.css");
    ?>

    <body>
        <?php
        if ($message) {
            echo $message;
        }
        if ($employeTrouve != null) {
        ?>
            <table>
                <tr>
                    <th>NOEMP</th>
                    <th>NOM</th>
                </tr>
                <tr>
                    <td><?php echo $employeTrouve->getNoemp(); ?></td>
                    <td><?php echo $employeTrouve->getNom(); ?></td>
                </tr>
            </table>
        <?php
        }
        ?>
    </body>

    </html>
<?php
}

function affiherFormRechercheParReference()
{
    afficherHeadHtml("../css/style.css");
?>

    <body>
        <form action="" method="POST">
            <label for="noemp">Saisissez votre référence :</label>
            <input type="text" name="noemp">
            <input type="submit" value="Search">
        </form>
    </body>

    </html>
<?php
}
?>