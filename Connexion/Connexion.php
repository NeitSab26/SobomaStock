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
            <a class="navbar-brand" href="../index.php">SobomaStock</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Accueil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nouveaute.php">Nouveautés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../catalogue.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../apropos.php">A propos</a>
                    </li>

                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" href="./Connexion/Connexion.php">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mx-40" style="text-align: center; ">
        <br>
        <h2>Connexion vers le site.</h2>
        <br>
        <div class="alert alert-dismissible alert-secondary">
            <p>Connectez-vou en tant que <strong>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="./formConnexionCli.php" role="button" aria-controls="offcanvasExample">
                        Client
                    </a>
                </strong></p>
        </div>
        <div class="alert alert-dismissible alert-secondary">
            <p>Connectez-vou en tant qu'
                <strong>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="./formConnexionEmp.php" role="button" aria-controls="offcanvasExample">
                        Employé
                    </a>
                </strong>
            </p>
        </div>
    </div>
   
</body>

</html>