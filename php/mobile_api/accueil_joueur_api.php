<?php 
// Importing DBConfig.php file.
include '../config.php';
include 'connexion_api.php';
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

if($result->rowCount()==1 ){

    $userinfo['nom'];
    echo json_encode($userinfo['nom'];);
}
?>