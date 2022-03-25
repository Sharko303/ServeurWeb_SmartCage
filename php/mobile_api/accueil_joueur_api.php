<?php 
// Importing DBConfig.php file.
include '../config.php';
include 'connexion_api.php';
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$userinfo['nom'];
$userinfo['prenom'];
$userinfo['categorie'];




?>