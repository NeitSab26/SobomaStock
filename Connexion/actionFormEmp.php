<?php
include "../annexe/bdd.php";
$salt = "Ls28pE66";

if(isset($_POST["matEmp"]) && isset($_POST["mdpEmp"])){
    $matricule= htmlspecialchars($_POST["matEmp"]);
    $req= $bdd->prepare("SELECT SHA2(CONCAT(SHA2(:salt,512),:mdp),512)");
    $req->bindParam(":salt", $salt);
    $req->bindParam(":mdp", $_POST['mdpEmp']);
    $req->execute();
    $resMdp=$req->fetch();
    echo($resMdp);

    $req= $bdd->prepare("SELECT count(*) FROM employe WHERE matricule_emp = :mat AND mdp_emp = :mdp");
    $req->bindParam(":mat", $matricule); 
    $req->bindParam(":mdp", $resMdp[0]);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_ASSOC); 
    $count = $res['count(*)'];
    echo($count);
    if ($count != 0){
        $req = $bdd->prepare("SELECT matricule_emp FROM employe WHERE matricule_emp = :mat AND mdp_emp = :mdp");
        $req->bindParam(":mat", $matricule); 
        $req->bindParam(":mdp", $resMdp[0]);
        $req->execute();
        $res= $req->fetch();
        $_SESSION["mat_emp"]=$res[0];
        header('Location: ../employe/mainEmp.php');

    }else{
        header('Location: Connexion.php?erreur="mail ou mdp incorrect"');
    }
}else{
    header("Location: ../index.php");
}
?>
