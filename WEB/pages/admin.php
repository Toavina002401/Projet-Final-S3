<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/tsotra.css">
</head>
<body>
    <div class="boite-login">
        <div class="section-img-login-admin">
            <img src="../assets/images/admin.svg" alt="image-login">
        </div>
        <div class="section-form-login-admin">
            <h1>Admin ...</h1>
            <form action="Traitements/traitementAdmin.php" method="get">
                <input type="text" name="pseudo" id="pseudo" class="insertion-donnees-login" placeholder="Email ..." value="cult@to.fr">
                <input type="password" name="mdp" id="mdp" class="insertion-donnees-login"  placeholder="Mot de passe" value="1234">
                <input type="submit" value="Connexion" class="btn-donnees-login">
            </form>
            <p><a href="#">s'inscrire</a><a href="login.php">/ utilisateur</a></p>            
        </div>
    </div>
</body>
</html>