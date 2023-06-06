<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
$tab=recupStock($bdd);
if(isset($_SESSION["id_cli"])){
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
        <a class="navbar-brand" href="./mainCli.php">SobomaStock</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="./mainCli.php">Accueil
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./stockCli.php">Stock</a>
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
 <div class="container mx-10">
 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Libelle</th>
      <th scope="col">Quantité</th>
      <th scope="col">Taille</th>
      <th scope="col">Essence</th>
      <th scope="col">fournisseur</th>
    </tr>
  </thead>
  <tbody>
   <?php
   for($indice=0;$indice<count($tab);$indice++){
    echo('
    <tr>
    <th scope="row">'.$tab[$indice]["libelle_mat"].'</th>
    <td>'.$tab[$indice]["quantite_mat"].'</td>
    <td>'.$tab[$indice]["taille_mat"].'</td>
    <td>'.$tab[$indice]["essence_mat"].'</td>
    <td>'.$tab[$indice]["libelle_entreprise_fou"].'</td>
  </tr>
      ');
   }
   ?>
  </tbody>
</table>
 </div>
  
  </body>
  
  </html>
  <?php
}else{
  header("Location: ../index.php");
}
?>
