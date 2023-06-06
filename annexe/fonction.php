<?php
//cryptage
$cle = "une cle";
$message = 'message';
$iv = "ceci est mon iv";
$cypherMethod = 'AES-256-CBC';
$date = date('Y-m-d');

function decrypterChamp($cle, $champCrypter , $cypherMethod, $iv)
{
        $messdecryp = openssl_decrypt($champCrypter, $cypherMethod, $cle, $option = 0, $iv);
        return $messdecryp;
}
function crypterChamp($cle, $champ, $cypherMethod, $iv)
{
    $messageCrypte = openssl_encrypt($champ, $cypherMethod, $cle, $option = 0, $iv);
    return $messageCrypte;
}

function recupNomEmp($mat, $bdd){
    $req = $bdd->prepare("SELECT nom_emp, prenom_emp FROM employe WHERE matricule_emp = :mat_emp");
    $req->bindParam(":mat_emp", $mat);
    $req->execute();
    $nomPrenom = $req->fetch(PDO::FETCH_ASSOC);
    return $nomPrenom;
}
function recupStock($bdd){
    $req= $bdd->query("SELECT *, libelle_entreprise_fou FROM matiere INNER JOIN fournisseur on fournisseur.id_fou=matiere.id_fou");
    $res= $req->fetchAll();
    // var_dump($res);
    return $res;

}
function reaprovisionnement($bdd, $mat,$quantite, $matricule,$date ){
    $req= $bdd->query("SELECT quantite_mat FROM matiere WHERE id_mat = $mat");
    $res= $req->fetchAll();
    $_SESSION["quantite"]=$quantite+$res[0][0];
    $updateQuery = $bdd->prepare("UPDATE matiere SET quantite_mat = :quantite WHERE id_mat = :id_mat");
    $result=intval($quantite)+intval($res[0][0]);
    $updateQuery->bindParam(":quantite", $result);
    $updateQuery->bindParam(":id_mat", $mat);
    $updateQuery->execute();

    $insertQuery = $bdd->prepare("INSERT INTO reapprovisionner (id_mat, matricule_emp, date, quantite) VALUES (:id_mat, :matricule, :date, :quantite)");
    $insertQuery->bindParam(":id_mat", $mat);
    $insertQuery->bindParam(":matricule", $matricule);
    $insertQuery->bindParam(":date", $date);
    $insertQuery->bindParam(":quantite", $quantite);
    $insertQuery->execute();
}
function recupReapro($bdd){
    $req=$bdd->query("SELECT libelle_mat, nom_emp, date, quantite FROM reapprovisionner
    INNER JOIN matiere on matiere.id_mat= reapprovisionner.id_mat 
    INNER JOIN employe on employe.matricule_emp= reapprovisionner.matricule_emp ");
    $res=$req->fetchAll();
    return $res;
}
function recupCommande($bdd,$id_cli){
    $req=$bdd->query("SELECT * FROM commande WHERE id_cli=".$id_cli);
    $res=$req->fetchAll();
    return $res;
}
function passerCommande($bdd,$mat,$com,$quantite){
    $req=$bdd->prepare("INSERT INTO `composer_de`(`id_mat`, `id_com`, `quantite_com`) VALUES (:id_mat,:id_com,:quantite)");
    $req->bindParam(":id_mat", $mat);
    $req->bindParam(":id_com", $com);
    $req->bindParam(":quantite", $quantite);
    $req->execute();

}
function recupContenuCommande($bdd,$id_cli){
    $req=$bdd->query("SELECT * FROM commande 
    INNER JOIN composer_de on composer_de.id_com=commande.id_com 
    INNER JOIN matiere on matiere.id_mat=composer_de.id_mat
    WHERE id_cli=".$id_cli);
    $res=$req->fetchAll();
    return $res;
}   
function creerCommande($bdd, $id_cli,$date,$nom){
    $req=$bdd->prepare("INSERT INTO `commande`(`id_com`, `id_cli`, `estValide`, `date_com`, `nom_com`) VALUES (?,?,?,?,?)");

    $req->bindValue(1, "");
    $req->bindValue(2, $id_cli);
    $req->bindValue(3, null);
    $req->bindValue(4, $date);
    $req->bindValue(5, $nom);
    $req->execute();
}
function valideCommande($bdd,$id_com){
    $bdd->query("UPDATE commande SET estValide=0 WHERE id_com= ".$id_com);
}
function recupClient($bdd){
    $req=$bdd->query("SELECT * FROM client");
    $res=$req->fetchAll();
    return $res;
}
function recupCommmandeValide($bdd){
    $req=$bdd->query("SELECT * FROM commande WHERE estValide=0");
    $res=$req->fetchAll();
    return $res;
}
?>