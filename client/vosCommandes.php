<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
$mesCom = recupContenuCommande($bdd, $_SESSION["id_cli"]);
$com = recupCommande($bdd, $_SESSION["id_cli"]);
// var_dump($com);
// var_dump($mesCom);
if (isset($_SESSION["id_cli"])) {
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
              <a class="nav-link" href="./mainCli.php">Accueil
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./stockCli.php">Stock</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./vosCommandes.php">Vos Commandes</a>
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
    <div class="container mx-20" style="display: flex; flex-direction:row;">
      <table class="table table-hover">
        <thead>
          <tr>

            <th scope="col">Numéro de commande</th>
            <th scope="col">Contenu de commande</th>
          </tr>
        </thead>
        <tbody>

          <?php
          for ($indice = 0; $indice < count($mesCom); $indice++) {
            echo ('
                <tr>
                <th scope="row">' . $mesCom[$indice]["id_com"] . ' : ' . $mesCom[$indice]["nom_com"] . '</th>
                <td>' . $mesCom[$indice]["libelle_mat"] . ' : ' . $mesCom[$indice]["quantite_com"] . '</td>
                </tr>
      ');
          }
          ?>

        </tbody>
      </table>
    </div>
    <div class="container">
      <form action="./validerCom.php" method="post">
        <select class="form-select" name="validCom" id="exampleSelect1">
          <?php
          for ($indice = 0; $indice < count($com); $indice++) {
            echo ("
        <option value='" . $com[$indice]['id_com'] . "'>" . $com[$indice]['id_com'] . " " . $com[$indice]['nom_com'] . "</option>
        ");
          }
          ?>
          <br>
          <input type="submit" class="btn btn-primary" value="Valider la commande">
      </form>
    </div>
    <?php if (isset($_SESSION["messageComValid"])) {
                        echo ("<br><p class='btn btn-success'>" . $_SESSION['messageComValid'] . "</p>");
                        unset($_SESSION['messageComValid']);
                    } ?>
  </body>

  </html>
<?php
} else {
  header("Location: ../index.php");
}
?>