<?php 
// Importing DBConfig.php file.
include '../config.php';
include 'connexion_api.php';
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

if($userexist==1 ){
    $nom=$userinfo['nom'];
    $prenom=$userinfo['prenom'];
    $categorie=$userinfo['categorie'];

    $Response[]=array("nom"=>$nom,"prenom"=>$prenom,"categorie"=>$categorie);
    echo json_encode($Response);
}
?>