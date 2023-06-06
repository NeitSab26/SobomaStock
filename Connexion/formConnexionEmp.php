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
                        <a class="nav-link active" href="./Connexion.php">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form class="container mx-20" action="./actionFormEmp.php" method="post">
        <h2>Connexion Employé.</h2>
        <div class="form-group ">
            <label for="exampleInputEmail1" class="form-label mt-4">Matricule</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="matEmp" aria-describedby="emailHelp" placeholder="Entrez votre Matricule">
            <small id="emailHelp" class="form-text text-muted">Ne donnez jamais votre mail et votre mot de passe.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="mdpEmp" placeholder="Entrez votre mot de passe">
        </div><br>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
</form>

</body>

</html>