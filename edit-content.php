<?php

/**
 * Exemple de page protégée du site (requiert autorization, et donc authentification)
 * La page est protégée à l'aide d'un JWT placé dans un cookie après authentification.
 */

require './globals.php';
require './jwt.php';
require './utils.php';

//Ici au check l'autorisation: pour cela on vérifie qu'il y a un JWT Token dans les cookies, 
//sinon on redirige sur Home. Il faut d'abord s'authentifier sur la page d'accueil 
//pour récupérer son JWT Token, puis checker l'autorisation d'accès à la page.

if (!isset($_COOKIE['jwt'])) {
    printSomethingAndExit();
}

//Validation du token signé
$jwFromUser = $_COOKIE['jwt'];

//Récupérer les différentes parties (analyse)
$parts = explode('.', $jwFromUser);

$headerEncoded = $parts[0];

$payloadEncoded = $parts[1];

$signatureFromUser = $parts[2];

//Vérifie la signature du token avec le secret
$signature = createSignature($headerEncoded, $payloadEncoded, SECRET);

//Si le jwt token a été modifié (header, payload ou signature, comme le secret est fixe et conservé côté serveur, la signature sera forcément? (statistiquement) différente)

if ($signature !== $signatureFromUser) {
    printSomethingAndExit("I can't trust you ! Go away !");
}

//On est sûrs que le token n'a pas été modifié depuis sa création, on peut extraire le rôle et vérifie si les autorisations associées permettent d'acceder à cette page.

$payload = json_decode(decodeBase64Url($payloadEncoded));

$role = $payload->role;

$login = $payload->login;

//Check l'expiration
$iat = $payload->iat;
$duration = $payload->duration;

if (time() > $iat + $duration) {
    printSomethingAndExit('I\'m sorry but even if your token seems valid, it has expired. Please authenticate again. <a href="index.php">Go home</a>');
}

if (!isset(ROLES[$role])) {
    printSomethingAndExit("I can't trust you ! Go away ! (Your role does not exists)");
}

$authorizations = ROLES[$role];

if (!in_array('edit-content', $authorizations)) {
    printSomethingAndExit("You don't have the permission to edit the content.");
}

?>



<h2>Welcome <?php echo htmlentities($login); ?></h2>
<p>Welcome my friend, you have the authorization (for <?php echo $iat + $duration - time() ?> seconds) to edit content on this website !</p>

<form action="logout.php">
    <input type="submit" value="Log out">
</form>