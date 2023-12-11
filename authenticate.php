<?php

/**
 * Page d'authentification
 */

require './jwt.php';
require './globals.php';
require './utils.php';

if (!(isset($_POST['login']) && isset($_POST['password']))) {
    printSomethingAndExit();
}

//On vérifie que l'user existe (identification), que son mot de passe est correcte (authentification), et on lui donne un role
//auquel sont attachées des autorisations. Ces données seront encapsulées dans le JWT crée après authentification.

//Identification

$isIdentified = $_POST['login'] === $userLogin;

if (!$isIdentified) {
    //En vrai on donnera pas autant d'informations,
    //on ne dira pas si c'est l'identification qui a échoué, ou l'authentification
    printSomethingAndExit("You are not identified.");
}

//Authentification

$isAuthenticated = password_verify($_POST['password'], $userPasswordHash);

if (!$isAuthenticated) {
    printSomethingAndExit("You are not authenticated !");
}

//Création d'un JWT Token avec le role dans le payload pour gérer les autorisations lors de requêtes ultérieures.
$jwt = createSignedJWT(
    array(
        "alg" => 'sha256',
        "typ" => "JWT"
    ),
    array(
        'login' => 'foo',
        'role' => 'editor',
        'iat' => time(),
        'duration' => 30
    ),
    SECRET
);

//Set un cookie avec l'option httponly (pour éviter qu'il soit manipulé par du code JavaScript)
setcookie('jwt', $jwt, httponly: true);
?>

<nav>
    <a href="edit-content.php">Edit content</a>
</nav>

<p>Hello <?php echo $userLogin ?>, please try to <a href="edit-content.php">edit some website content</a></p>