<?php
/**
 *  classe premetante a visualiser la progression d'un joueur.
 */
/**
 * 
 */
require_once '../config.php';
class CSeance
{
    private $_identifiant;
    public $_id_seance;

/*function __construct()
{
    $this->_id_seance = $_id_seance;
}*/
    public function afficherListe()
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
        public function afficherJoueur()
        {
            $_bdd = $this->_bdd;
            $_categorie = $this->_categorie;
            $sql = 'SELECT nom FROM utilisateurs WHERE categorie = "'.$_categorie.'"';
            //$liste = $bdd->query($sql) as $bdd);
            $liste = $_bdd->query($sql);
            $i = 7;
            while ($donnees = $liste->fetch())
            {
                $nomselect = $donnees['nom'];
                echo "<br><INPUT TYPE=checkbox NAME=\"$i\" VALUE=\"$nomselect\">".$nomselect,$i.'</option>';
                $i++;
                
            } 
        }
    
    public function Creer_Seance()
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
        $zonetir = (string) $zonetir;
       
        if (isset($zonetir)) 
        {
            $check = $_bdd->prepare('SELECT entraineur, categorie, nb_essai, date, zone_tir FROM seance WHERE nom = ?');
            $check->execute(array($_nom));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row == 0)
                {
                            //$_nom = $data['Id_Utilisateur'];
                            $insert = $_bdd->prepare('INSERT INTO seance(entraineur, categorie, nb_essai, date) VALUES( :entraineur, :categorie, :nb_essai, :date)');
                            $insert->execute(array(
                                'entraineur' => $_nom,
                                'categorie' => $_categorie,
                                'nb_essai' => $_nb_essai,
                                'date' => $_date,
                            ));
                            $id_seance = $_bdd->lastInsertId();// on recruperer le dernier id que nous avons crée
                            $this->_id_seance = $id_seance;
                            $insert2 = $_bdd->prepare('INSERT INTO seance_cible(id_seance, id_cible) VALUES(:id_seance, :id_cible)');
                            for ($i=0; $i <= 6; $i++) 
                                {
                                    if (isset($_zone[$i]))
                                        {
                                            $insert2->execute(array(
                                            'id_seance' => $id_seance,
                                            'id_cible' => $_zone[$i],
                                            ));
                                        }
                                }
                } else 
                {
                    header('Location:/ServeurWeb_SmartCage/php/entraineur/seance.php?seance_err=erreur');
                }
                
            }
        }
        public function Participer()
            {
                $_limit = $this->_limit;
                $_bdd = $this->_bdd;
                $_joueur = array();
                $id_seance = $this->_id_seance;
                
                for ($i=7; $i <= $_limit; $i++) 
                    {
                        if (isset($this->_joueur[$i]))
                            {
                                $_joueur[$i] = $this->_joueur[$i];
                                $req_id_joueur[$i] = 'SELECT Id_Utilisateur FROM utilisateurs WHERE nom ="'.$_joueur[$i].'"';
                                $rep_id_joueur[$i]=$_bdd->query($req_id_joueur[$i]);
                                $id_joueur[$i]=$rep_id_joueur[$i]->fetch();
                                print_r($id_joueur[$i][0]);
                                
                            }
                    }

                    
                            
                            
                            $insert2 = $_bdd->prepare('INSERT INTO participe(id_utilisateur, id_seance, score) VALUES(:id_utilisateur, :id_seance, :score)');
                            for ($i=7; $i <= $_limit; $i++) 
                                {
                                    if (isset($_joueur[$i]))
                                        {
                                            //$id_joueur = 'SELECT Id_Utilisateur FROM utilisateurs WHERE nom = "'.$_joueur[$i].'"';
                                            $insert2->execute(array(
                                            'id_utilisateur' => $id_joueur[$i][0],
                                            'id_seance' => $id_seance,
                                            'score' => 0,
                                            ));
                                        }
                                }
                                header('Location:/ServeurWeb_SmartCage/php/entraineur/index-entraineur.php?seance_err=success');
            }
    }
?>