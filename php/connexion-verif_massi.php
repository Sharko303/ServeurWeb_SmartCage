<?php
// Importing DBConfig.php file.
include 'config.php';
$obj = json_decode('php://input');
// Populate User nom from JSON $obj array and store into $nom.
$nom = $obj['nom'];

 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];

if ($nom != 0){
    $result = PDO::query("SELECT * FROM utilisateurs WHERE nom = '$nom' and password = '$password'");

    if($result->num_rows==0){
        echo json_encode('Mauvaises Informations');
    }
    else{
        exho json_encode('ok');
    }
}
else{
    echo json_encode('rééssayer');
}
?>