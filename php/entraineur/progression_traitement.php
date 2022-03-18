<?php
require_once "CProgression.php";
require_once "../config.php";

$joueur = htmlspecialchars($_POST['nom']);
echo $joueur;
$liste = new CProgression();
$liste->afficher();
?>
