<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
$nomPrenom = recupNomEmp($_SESSION["mat_emp"], $bdd);
$nom = $nomPrenom['nom_emp'];
$prenom = $nomPrenom['prenom_emp'];
if(isset($_SESSION["mat_emp"])){
  ?>
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/united/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="./img/logo.jpg" />
    <title>SobomaStock</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="./mainEmp.php">SobomaStock</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="./mainEmp.php">Accueil
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./stockEmp.php">Stock</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./reaprovisionnement.php">Réaprovisionnement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./commande.php">Commande</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./client.php">Client</a>
            </li>
            <?php
            if($_SESSION["mat_emp"]===11111){
              echo('
              <li class="nav-item">
              <a class="nav-link" href="./adminEmp/log.php">Log</a>
            </li>
              ');
            }
            ?>
          </ul>
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="../annexe/logout.php">Déconnexion</a>
            </li>
          </ul>
  
        </div>
      </div>
    </nav>
  <?php echo(" <h3>Bonjour $nom $prenom !</h3>"); ?>

  <div class="container" style="display: flex; flex-direction:row;" >
  <img src="../img/mag.jpg" alt="magasin de bois" style="height: 450px;">
  <br><p>Vous êtes bien connecté en tant qu'Employé.</p>
  </div>
  
  </body>
  
  </html>
  <?php
}else{
  header("Location: ../index.php");
}
?>
