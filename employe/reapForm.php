<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
if(isset($_POST['id_materiaux'])&& isset($_POST['quantite_mat'])) {
    
reaprovisionnement($bdd,$_POST['id_materiaux'],$_POST['quantite_mat'],$_SESSION["mat_emp"],date('Y-m-d H:i:s'));
$_SESSION['message'] = "Le formulaire a été soumis avec succès !";
header("Location: ./reaprovisionnement.php");

}
?>