<?php
require_once 'config.php';

                     /*$insert = $bdd->prepare('INSERT INTO seance(entraineur, categorie, nb_essai, date, zone_tir) VALUES(:entraineur, :categorie, :nb_essai, :date, :zone_tir)');
                            $insert->execute(array(
                                'entraineur' => '$nom',
                                'categorie' => '$prenom',
                                'nb_essai' => '$password',
                                'date' => '$categorie',
                                'zone_tir' => 'joueur',
                            ));*/
                            $entraineur = 'test$';
                            $categorie = 'test$';
                            $nb_essai = 1;
                            $date = 'U15+';
                            $zone_tir = 'joueur';

                            $insert = $bdd->prepare('INSERT INTO seance(entraineur, categorie, nb_essai, date, zone_tir) VALUES(:entraineur, :categorie, :nb_essai, :date, :zone_tir)');
                            $insert->execute(array(
                                'entraineur' => $entraineur,
                                'categorie' => $categorie,
                                'nb_essai' => $nb_essai,
                                'date' => $date,
                                'zone_tir' => $zone_tir,
                            ));
?>