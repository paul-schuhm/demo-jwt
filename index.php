<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWT</title>
</head>

<body>
    <nav>
        <a href="edit-content.php">Edit content</a>
    </nav>

    <h1>Welcome</h1>
    <h2>Login</h2>

    <form action="authenticate.php" method="POST">
        <label>Login:</label><input type="text" name="login" />
        <label>Password:</label><input type="password" name="password" />
        <input type="submit" value="Sign in" />
    </form>
</body>

</html>