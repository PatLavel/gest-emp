<?php
session_start();
if (isset($_GET["deco"])) {
    session_destroy();
}


// print_r ($_SESSION);

if (isset($_GET["check"])) {
            ?> <td>Informations Incorectes</td> <?php }; ?>

<form action="Cookie.php" method="POST">
        <td>username</td>
        <input type="text" class="form-control" name="user" placeholder="nom"  value="" >
        <td>password</td>
        <input type="text" class="form-control" name="pass" placeholder="******"  value="" >
        <input type="submit" class="btn btn-success" value="Soumettre">
      </form> 