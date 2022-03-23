<?php
require_once '../config.php'; // ajout de la base de donnée

$nom = htmlspecialchars($_POST['nom']);
$categorie = htmlspecialchars($_POST['categorie']);
    
echo $valeur;


/*$check = $bdd->prepare('SELECT nom, categorie, zone_tir FROM seance WHERE nom = ?');
        $check->execute(array($nom));
        $data = $check->fetch();
        $row = $check->rowCount();
        if($row == 0)
        {
            // On insère dans la base de données les informations de la seance
                            $insert = $bdd->prepare('INSERT INTO seance(nom, categorie, zone_tir) VALUES(:nom, :categorie, :zone_tir)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'categorie' => $categorie,
                                   'zone_tir' => $zone_tir,
                            ));*/
?>
