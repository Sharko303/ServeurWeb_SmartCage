<?php
require_once '../config.php'; // ajout de la base de donnée
require_once 'Cseance.php';

$nom = htmlspecialchars($_POST['nom']);
$categorie = htmlspecialchars($_POST['categorie']);
$date = htmlspecialchars($_POST['date']);
$seance = new CSeance();
$seance->_bdd = $bdd;
$seance->_nom = $nom;
$seance->_categorie = $categorie;
$seance->_date = $date;
if (isset($nom)) 
{
    if (isset($categorie)) 
    {
        
            $zone = array();
            for ($i=0; $i <= 6 ; $i++) 
            {
            
                if (isset($_POST[$i])) 
                    {
                        $zone[$i] = $_POST[$i];
                        $seance->_zone[$i] = $zone[$i];
                    }
        
            }
          
        $seance->Creer_Seance();
        $limitest = 'SELECT count(*) FROM utilisateurs WHERE categorie = "'.$categorie.'"';
        $query = $bdd->query($limitest);
        $limit = $query->fetchColumn();
        
            $seance->_limit = $limit;
            $limit = $limit + 7;
             for ($i=7; $i <= $limit ; $i++) 
            {
                if (isset($_POST[$i]))
                {
                            $joueur[$i] = $_POST[$i];
                            $seance->_joueur[$i] = $joueur[$i];
                }
                
            }
            $seance->_limit = $limit;
            $seance->Participer();
    }
}
?>
