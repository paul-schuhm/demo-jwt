<?php

/**
 * Fonctions utilitaires
 */

/**
 * Imprime un message et arrête le script
 * @return
 */
function print_something_and_exit(string $msg = 'Go Away !')
{
    echo sprintf("%s\n", $msg);
    exit;
}
