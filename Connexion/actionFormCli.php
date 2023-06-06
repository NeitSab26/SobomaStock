<?php
include "../annexe/bdd.php";
$salt = "Ls28pE66";

if(isset($_POST["mailCli"]) && isset($_POST["mdpCli"])){
    $matricule= htmlspecialchars($_POST["mailCli"]);
    $req= $bdd->prepare("SELECT SHA2(CONCAT(SHA2(:salt,512),:mdp),512)");
    $req->bindParam(":salt", $salt);
    $req->bindParam(":mdp", $_POST['mdpCli']);
    $req->execute();
    $resMdp=$req->fetch();
    echo($resMdp);

    $req= $bdd->prepare("SELECT count(*) FROM client WHERE mail_cli = :mat AND mdp_cli = :mdp");
    $req->bindParam(":mat", $matricule); 
    $req->bindParam(":mdp", $resMdp[0]);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $count = $res['count(*)'];
    echo($count);
    if ($count != 0){
        $req = $bdd->prepare("SELECT id_cli FROM client WHERE mail_cli = :mat AND mdp_cli = :mdp");
        $req->bindParam(":mat", $matricule); 
        $req->bindParam(":mdp", $resMdp[0]);
        $req->execute();
        $res= $req->fetch();
        $_SESSION["id_cli"]=$res[0];
        header('Location: ../client/mainCli.php');

    }else{
        header('Location: Connexion.php?erreur="mail ou mdp incorrect"');
    }
}else{
    header("Location: ../index.php");
}
?>
