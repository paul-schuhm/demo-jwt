<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démo JWT Token</title>
</head>

<body>
    <nav>
        <a href="edit-content.php">Éditer le contenu du site</a>
    </nav>

    <h1>Bienvue</h1>
    <h2>Login</h2>

    <form action="authentificate.php" method="POST">
        <label>Login:</label><input type="text" name="login" />
        <label>Password:</label><input type="password" name="password" />
        <input type="submit" value="Sign in" />
    </form>
</body>

</html>