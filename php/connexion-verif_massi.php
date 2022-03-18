<?php
// Importing DBConfig.php file.
include 'config.php';
// Populate User nom from JSON $obj array and store into $nom.
$nom = $obj['nom'];

 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];

$query = "SELECT * FROM utilisateurs WHERE nom = '$nom' and password = '$password'";
$exeSQL = PDO::query($con, $SQL);
$checkNom = PDOStatement::rowCount($exeSQL);
if ($nom != 0){
    $arrayu = PDOStatement::rowCount($exeSQL);
    if ($arrayu['password'] != $password) {
        $Message = "Mot de passe incorrect !";
    } else {
        $Message = "Connexion effectué avec succès !";
    }
}   else {
    $Message = "Utilisateur Inconnu";
}

$response[] = array ("Message" => $Message);
echo json_encode($response);