<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Login</title>
    <link rel="stylesheet" href="../assets/css/styleTsotra.css">
</head>
<body>
    <div class="boite-login">
        <div class="section-img-login">
            <img src="../assets/images/login.svg" alt="image-login">
        </div>
        <div class="section-form-login">
            <h1>Login ...</h1>
            <form action="Traitements/traitementLogin.php" method="get">
                <input type="text" name="pseudo" id="pseudo" class="insertion-donnees-login" placeholder="Email ..." value="util@to.fr">
                <input type="password" name="mdp" id="mdp" class="insertion-donnees-login"  placeholder="Mot de passe" value="1234">
                <input type="submit" value="Connexion" class="btn-donnees-login">
            </form>
            <p><a href="#">s'inscrire</a><a href="admin.php">/ admin</a></p> 
        </div>
    </div>
</body>
</html>