
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">

</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="dashboard.php" method="GET">
            <input type="text" name="user" placeholder="Nom d'utilisateur">
            <input type="password" placeholder="mdp" name="mdp">
            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>
