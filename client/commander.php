<?php
include "../annexe/fonction.php";
include "../annexe/bdd.php";
$tab = recupStock($bdd);
$com = recupCommande($bdd, $_SESSION["id_cli"]);
// var_dump($com);
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
                            <a class="nav-link " href="./mainCli.php">Accueil
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
                            <a class="nav-link active" href="./commander.php">Commander</a>
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
            <br>
            <div class="container mx-20">
                <p class=""><a href="./creerCommande.php">Cliquez ici</a> pour créer une nouvelle commande. </p>
                <form action="./commanderForm.php" method="post">
                    <div class="card mb-3">
                        <h3 class="card-header">Commande</h3>
                        <div class="card-body">
                            <h5 class="card-title">Sélectionner une Commande :</h5>
                            <h6 class="card-subtitle text-muted">(Sélection par le nom de commande)</h6>
                        </div>
                        <div class="card-body">
                            <select class="form-select" name="commande" id="exampleSelect1">
                                <?php
                                for ($indice = 0; $indice < count($com); $indice++) {
                                    echo ('<option value="' . $com[$indice]["id_com"] . '">' . $com[$indice]["nom_com"] . ' (' . $com[$indice]["id_com"] . ')</option>');
                                }
                                ?>
                            </select>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>Veuillez choisir la matière :</p>
                                <select class="form-select" name="id_matt" id="exampleSelect1">
                                    <?php
                                    for ($indice = 0; $indice < count($tab); $indice++) {
                                        echo ('<option value="' . $tab[$indice]["id_mat"] . '">' . $tab[$indice]["libelle_mat"] . ' ( '  . $tab[$indice]["taille_mat"] . ', ' . $tab[$indice]["essence_mat"] . ')</option>');
                                    }
                                    ?>
                            </li>
                            <br>
                            <li class="list-group-item">
                                <input class="form-control-plaintext" type="number" name="quantite_mat" placeholder="Quantité">
                                <p>Quantité(s)</p>
                            </li>
                        </ul>
                        <div class="card-body">
                            <input type="submit" class="btn btn-primary" value="Valider La commande" />
                        </div>
                        <div class="card-footer text-muted">
                            Veuillez bien remplir tout les champs.
                        </div>
                    </div>
                    <?php if (isset($_SESSION["messageCom"])) {
                        echo ("<br><p class='btn btn-success'>" . $_SESSION['messageCom'] . "</p>");
                        unset($_SESSION['messageCom']);
                    } ?>

                </form>
            </div>
        </div>

    </body>

    </html>
<?php
} else {
    header("Location: ../index.php");
}
?>