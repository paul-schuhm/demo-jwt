<?php

/**
 * Contient les constantes de l'application (pour la démo)
 */

/**
 * Le secret pour "saler" les JWT Tokens
 */
DEFINE('SECRET', 'secret_pour_signer_mes_tokens');


/**
 * Les roles donnent acces à des routes sur le site
 */
DEFINE('ROLES', array(
    'editor' => array('edit-content')
));


//Simulons une base de données avec un login/password
$userLogin = "foo";
$userPasswordHash = password_hash("bar", PASSWORD_DEFAULT);
$userRole = "editor";
