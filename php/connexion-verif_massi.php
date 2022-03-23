<?php
// Importing DBConfig.php file.
include 'config.php';
$json = file_get_contents('php://input');
$json2 = file_get_contents('php://input');
$obj = json_decode($json,true);
$obj2 = json_decode($json2, true);
// Populate User nom from JSON $obj array and store into $nom.
$nom = $obj['nom']; 
// Populate Password from JSON $obj array and store into $password.
$password = hash('sha256',$obj['password']); 
// Populate type from JSON $obj array and store into $type.
$type = $obj2['type'];

if ($obj['nom']!=""){
    $result = $bdd->query("SELECT * FROM utilisateurs WHERE nom = '$nom' and password = '$password'");
        if ($result->rowCount()==0){
            echo json_encode('Mauvaises Informations');
        }
        else{
            echo json_encode('ok');
            $verif = $bdd->query("SELECT * FROM utilisateurs WHERE type = '$type'");
            if ($type == 'entraineur'){
                echo json_encode('entraîneur');
            }
            
            else ($type == 'joueur'){
                echo json_encode('joueur');
            }
        }
}

else{
    echo json_encode('ressayer');
}



?>