<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
$tab = recupStock($bdd);
$histo = recupReapro($bdd);
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
                            <a class="nav-link" href="./mainEmp.php">Accueil
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./stockEmp.php">Stock</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./reaprovisionnement.php">Réaprovisionnement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./commande.php">Commande</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./client.php">Client</a>
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
        <div class="container mx-20">
            <div class="form-group">
                <form method="post" action="./reapForm.php">
                    <label for="exampleSelect1" class="form-label mt-4">Veuillez choisir la piece à réaprovissionner</label>
                    <select class="form-select" name="id_materiaux" id="exampleSelect1">
                        <?php
                        for ($indice = 0; $indice < count($tab); $indice++) {
                            echo ('<option value="' . $tab[$indice]["id_mat"] . '">' . $tab[$indice]["libelle_mat"] . ' (' . $tab[$indice]["taille_mat"] . ')</option>');
                        }
                        ?>
                    </select>
                    <br>
                    <div class="form-group">
                        <label class="form-label mt-4">Quantité</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text">unité</span>
                                <input type="number" name="quantite_mat" class="form-control" aria-label="quantité">
                                <span class="input-group-text">.00</span>
                            </div>

                        </div>
                    </div>
                    <br>
                    <input class="btn btn-primary" name="submmit" type="submit" placeholder="envoyer">
                </form>
            </div>
            <br>
            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Libelle</th>
      <th scope="col">Employé</th>
      <th scope="col">Date</th>
      <th scope="col">Quantitées ajoutées</th>
    </tr>
  </thead>
  <tbody>
  <?php
   for($indice=0;$indice<count($histo);$indice++){
    echo('
    <tr>
    <th scope="row">'.$histo[$indice]["libelle_mat"].'</th>
    <td>'.$histo[$indice]["nom_emp"].'</td>
    <td>'.$histo[$indice]["date"].'</td>
    <td>'.$histo[$indice]["quantite"].'</td>
  </tr>
      ');
   }
   ?>
  </tbody>
</table>
        </div>
        <?php if (isset($_SESSION["message"])) {
            echo ("<br><p class='btn btn-success'>" . $_SESSION['message'] . "</p>");
            unset($_SESSION['message']);
        } ?>


    </body>

    </html>
<?php
} else {
    header("Location: ../index.php");
}
?>