<?php
// Importing DBConfig.php file.
include '../config.php';
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
// Populate User nom from JSON $obj array and store into $nom.
$nom = $obj['nom']; 
// Populate Password from JSON $obj array and store into $password.
$password = hash('sha256',$obj['password']);

if ($obj['nom']!=""){
    $result = $bdd->query("SELECT * FROM utilisateurs WHERE nom = '$nom' and password = '$password'");
        
    if ($result->rowCount()==0){
            echo json_encode('Mauvaises Informations');
        }
        else{
            $userinfo = $result->fetch();
            if($userinfo['type'] == 'entraineur'){
            echo json_encode('entraineur');
            }
            elseif($userinfo['type'] == 'joueur'){
            echo json_encode('joueur');
            }
        }
}

else{
    echo json_encode('reessayer');
}
?>