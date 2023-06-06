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
            <a class="navbar-brand" href="index.php">SobomaStock</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php">Accueil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./nouveaute.php">Nouveautés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./catalogue.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./apropos.php">A propos</a>
                    </li>

                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="./Connexion/Connexion.php">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="text-align: center;">
        <h2>Bienvenue sur SobomaStock.</h2>
        <p>Connectez-vous en <a href="#"> cliquant ici </a> pour passer commande. Accéder à notre cathalogue dans le menu de navigation sans se connecter.</p>
        <div class="alert alert-dismissible alert-secondary" style="display: flex;">
            <img src="./img/map.png" style="height:250px;" class="img-fluid">
            <p><strong>Notre métier</strong><br>
                Soboma est leader dans la fourniture de bois de charpente et de ses dérivés à destination des professionnels et particuliers.
                Avec un choix inégalé et une approche d'écoute et de conseil, Soboma propose une palette complète de produits et services pour les projets standards et sur mesure.
            </p>
            <div></div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nos offres de produits et services</h4>
                <h6 class="card-subtitle mb-1 text-muted">Le panel de produits et services proposés comprend :</h6>
                <p class="card-text"><a href="./catalogue.php">Cliquez-ici pour plus d'informations</a></p>
            </div>
        </div>
    </div>
</body>

</html>