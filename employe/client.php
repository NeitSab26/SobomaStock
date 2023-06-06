<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
$cli=recupClient($bdd);
// var_dump($cli);
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
              <a class="nav-link" href="./mainEmp.php">Accueil
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
              <a class="nav-link active" href="./client.php">Client</a>
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

  <div class="container" style="display: flex; flex-direction:row;" >
  <h3>Voici tout les clients enregistrés.</h3>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Nom</th>
      <th scope="col">Mail</th>
      <th scope="col">Libelle entreprise</th>
    </tr>
  </thead>
  <tbody>
  <?php
          for ($indice = 0; $indice < count($cli); $indice++) {
            echo ('
                <tr>
                <th scope="row">' . $cli[$indice]["id_cli"] . ' </th>
                <td>' . $cli[$indice]["nom_cli"] . ' : ' . $cli[$indice]["prenom_cli"] . '</td>
                <td>' . $cli[$indice]["mail_cli"] . '</td>
                <td>' . $cli[$indice]["libelle_entreprise_cli"] . '</td>
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
