<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
if(isset($_POST["validCom"])){
    valideCommande($bdd,$_POST["validCom"]);
    $_SESSION['messageComValid'] = "Le formulaire a été validé avec succès !";
    header("Location: ./vosCommandes.php");
}
?>