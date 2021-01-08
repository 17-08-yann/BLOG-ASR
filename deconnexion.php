<?php
require_once 'config/config.conf.php';
require_once 'config/bdd.conf.php';

// MODIFIE LE COOKIE POUR PERDRE LA CONNEXION
setcookie('sid', '',-1);

$_SESSION['notification']['result']='danger';
$_SESSION['notification']['message']='Vous êtes déconnecté';
header("Location: index.php?p=1");
exit();