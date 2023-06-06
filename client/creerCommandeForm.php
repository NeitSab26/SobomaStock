<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
if(isset($_POST["nomCom"])){
    creerCommande($bdd,$_SESSION['id_cli'],date(" Y-m-d h:i:s"),$_POST["nomCom"]);
    $_SESSION['messageCreer'] = "Le formulaire a été soumis avec succès !";

    header("Location: ./creerCommande.php");
}
?>