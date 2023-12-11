<?php

/**
 * Fonctions utilitaires
 */

/**
 * Imprime un message et arrête le script
 * @return
 */
function printSomethingAndExit(string $msg = 'Go Away !')
{
    echo sprintf("%s\n", $msg);
    exit;
}
