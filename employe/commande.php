<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
$com = recupCommmandeValide($bdd);
// var_dump($com);
if (isset($_SESSION["mat_emp"])) {
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
              <a class="nav-link active" href="./commande.php">Commande</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./client.php">Client</a>
            </li>
            <?php
            if ($_SESSION["mat_emp"] === 11111) {
              echo ('
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

    <div class="container" style="display: flex; flex-direction:row;">
      <br>
      <p>Il y a <?php echo (count($com)) ?> commandes de prêtes.</p>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Client</th>
            <th scope="col">date Commmande</th>
            <th scope="col">Nom Commande</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($indice = 0; $indice < count($com); $indice++) {
            echo ('
                <tr>
                <th scope="row">' . $com[$indice]["id_cli"] . ' </th>
                <td>' . $com[$indice]["id_com"] . ' : ' . $com[$indice]["date_com"] . '</td>
                <td>' . $com[$indice]["nom_com"] . '</td>
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
} else {
  header("Location: ../index.php");
}
?>