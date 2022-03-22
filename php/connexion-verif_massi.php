<?php
// Importing DBConfig.php file.
include 'config.php';
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
// Populate User nom from JSON $obj array and store into $nom.
$nom = $obj['nom']; 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];
//Type of users
$type = $obj['type'];

if ($obj['nom']!=""){
    $result = $bdd->query("SELECT * FROM utilisateurs WHERE nom = '$nom' and password = '$password' an type='$type'");
        if ($result->rowCount()==0){
            echo json_encode('Mauvaises Informations');
        }
        else{
        echo json_encode('ok')
        if($result->rowCount()==1){
            if($type == "entraineur"){
                echo json_encode('entraineur')
            }
            if($type == "joueur"){
                echo json_encode('joueur')
            }
        }
        }
    }
else{
    echo json_encode('ressayer');
}
?>