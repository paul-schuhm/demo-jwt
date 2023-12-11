<?php
//Au log out, on supprime le JWT dans les cookies
setcookie('jwt', "", httponly: true);
require './index.php';
exit;