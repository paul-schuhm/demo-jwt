<?php

/**
 * Page d'authentification
 */

require './jwt.php';
require './globals.php';
require './utils.php';

if (!(isset($_POST['login']) && isset($_POST['password']))) {
    print_something_and_exit();
}

//On vérifie que l'user existe (identification), que son mot de passe est correcte (authentification), et on lui donne un role
//auquel sont attachées des autorisations. Ces données seront encapsulées dans le JWT crée après authentification.

//Identification

$identified = $_POST['login'] === $userLogin;

if (!$identified) {
    //En vrai on donnera pas autant d'informations,
    //on ne dira pas si c'est l'identification qui a échoué, ou l'authentification
    print_something_and_exit("You are not identified.");
}

//Authentification

$authentificated = password_verify($_POST['password'], $userPasswordHash);

if (!$authentificated) {
    print_something_and_exit("You are not authentificated !");
}

//Création d'un JWT Token avec le role dans le payload pour gérer les autorisations lors de requêtes ultérieures.
$jwt = create_signed_jwt_token(
    array(
        "alg" => 'sha256',
        "typ" => "JWT"
    ),
    array(
        'login' => 'foo',
        'role' => 'editor'
    ),
    SECRET
);

//Set un cookie avec l'option httponly (pour éviter qu'il soit manipulé par du code JavaScript)
setcookie('jwt', $jwt, httponly: true);
?>

<nav>
    <a href="edit-content.php">Éditer le contenu du site</a>
</nav>