<?php
/**
 *  classe premetante a visualiser la progression d'un joueur.
 */
/**
 * 
 */
require_once '../config.php';
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

class CSeance
{
    private $_joueur;
    private $_identifiant;

    function afficherListe()
        {
            $_bdd = $this->_bdd;
            $sql = "SELECT nom FROM utilisateurs WHERE type = 'entraineur'";
            //$liste = $bdd->query($sql) as $bdd);
            $liste = $_bdd->query($sql);
            while ($donnees = $liste->fetch())
            {
                $nomselect = $donnees['nom'];
                echo "<OPTION VALUE=\"$nomselect\">".$nomselect.'</option>';
            } 
        }

    function afficherJoueur()
    {
            $_joueur = htmlspecialchars($_POST['nom']);
            echo $_joueur;
            $liste = new CProgression();
    }
    
    function Creer_SeanceU15()
    {
        $_bdd = $this->_bdd;
        $_nom = $this->_nom;
        $_categorie = $this->_categorie;
        $_nb_essai = 3;        
        $_date = $this->_date;
        //$id_entraineur = "SELECT Id_Utilisateur FROM utilisateurs WHERE nom = $_nom";

        $_zone = array();
        for ($i=0; $i <= 6; $i++) 
        {
            if (isset($this->_zone[$i]))
                {
                    $_zone[$i] = $this->_zone[$i]; 
                    //$zonetir = &_zone;
                } 
                //print_r($zonetir) ;
        }
        $zonetir = implode(",", $_zone); // on entre chaque caleur de notre tableau en 1 valeur separer par des virgule ex : tableau(2, 4, 6) = 2,4,6
        echo $zonetir;
       
        $zonetir = (string) $zonetir;
       
        if (isset($zonetir)) 
        {
            $check = $_bdd->prepare('SELECT entraineur, categorie, nb_essai, date, zone_tir FROM seance WHERE nom = ?');
            $check->execute(array($_nom));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row == 0)
                {
                            $_nom = $data['Id_Utilisateur'];
                            $insert = $_bdd->prepare('INSERT INTO seance(categorie, nb_essai, date, zone_tir) VALUES(:entraineur, :categorie, :nb_essai, :date, :zone_tir)');
                            $insert->execute(array(
                                //'entraineur' => $id_entraineur,
                                'categorie' => $_categorie,
                                'nb_essai' => $_nb_essai,
                                'date' => $_date,
                            ));
                           /* $insert2 = $_bdd->prepare('INSERT INTO seance_cible(id_seance, id_cible) VALUES(:id_seance, :id_cible)');
                            $id_seance = 
                            $insert2->execute(array(
                                'id_seance' => $id_seance,
                                'id_cible' => $_cible,
                            ));*/
    
                            header('Location:/ServeurWeb_SmartCage/php/entraineur/index-entraineur.php?seance_err=success');
                } else 
                {
                    header('Location:/ServeurWeb_SmartCage/php/entraineur/seance.php?seance_err=erreur');
                }
            }
        }
    /*function Creer_SeanceU13()
    {
        $i = 1;
        $_zonetir = '';
        $btn1= 'bouton1';
        $btn2= 'bouton2';
        $btn3= 'bouton3';
        $btn4= 'bouton4';

        while ($i <= 4, i++)
        {
            if (isset($btn$i)) 
                {
                    $_zonetir=$_zonetir','$btn$i;
                    $i++;
                }
        }
        if (isset($zonetir)) 
        {
            $check = $bdd->prepare('SELECT nom, categorie, zone_tir FROM seance WHERE nom = ?');
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
                            ));
                }
            }
        }
    function Creer_SeanceU6()
    {
        $i = 1;
        $_zonetir = '';
        $btn1= 'bouton1';
        $btn2= 'bouton2';

        while ($i <= 2, i++)
        {
            if (isset($btn$i)) 
                {
                    $_zonetir=$_zonetir','$btn$i;
                    $i++;
                }
        }
        if (isset($zonetir)) 
        {
            $check = $bdd->prepare('SELECT nom, categorie, zone_tir FROM seance WHERE nom = ?');
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
                            ));
                }
            }
        }*/   
    }
?>