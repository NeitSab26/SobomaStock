<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";

if(isset($_SESSION["id_cli"])){
  ?>
  <!DOCTYPE html>
  <html lang="fr">
  
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
        <a class="navbar-brand" href="./mainCli.php">SobomaStock</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="./mainCli.php">Accueil
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./stockCli.php">Stock</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./vosCommandes.php">Vos Commandes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./commander.php">Commander</a>
            </li>
           
          </ul>
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="../annexe/logout.php">Déconnexion</a>
            </li>
          </ul>
  
        </div>
      </div>
    </nav>
<br>
  <div class="container mx-20" style="display: flex; flex-direction:row;" >
  <img src="../img/mag.jpg" alt="magasin de bois" style="height: 450px;">
  <br><p>Vous êtes bien connecté en tant que Client.</p>
  </div>
  
  </body>
  
  </html>
  <?php
}else{
  header("Location: ../index.php");
}
?>
