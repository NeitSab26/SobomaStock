<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
if(isset($_POST["commande"])&&isset($_POST["id_matt"])&&isset($_POST["quantite_mat"])){

    passerCommande($bdd,$_POST["id_matt"],$_POST["commande"],$_POST["quantite_mat"]);
    $_SESSION['messageCom'] = "Le formulaire a été soumis avec succès !";
    header("Location: ./commander.php");


}
?>