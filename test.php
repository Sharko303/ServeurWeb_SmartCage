<?php
require_once 'php/config.php';
$insert = $bdd->prepare('INSERT INTO seance(entraineur, categorie, nb_essai, date, zone_tir) VALUES(:entraineur, :categorie, :nb_essai, :date, :zone_tir)');
                            $insert->execute(array(
                                'entraineur' => 48,
                                'categorie' => 'U15+',
                                'nb_essai' => 2,
                                'date' => '10/12/2002',
                                'zone_tir' => '1',
                            ));
?>