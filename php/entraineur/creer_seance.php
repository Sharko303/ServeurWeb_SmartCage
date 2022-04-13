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
        if ($categorie == 'U15+') 
        {
            $zone = array();
            for ($i=0; $i <= 9 ; $i++) 
            {
            
                if (isset($_POST[$i])) 
                    {
                        $zone[$i] = $_POST[$i];
                        $seance->_zone[$i] = $zone[$i];
                    }

            }
            
            $seance->Creer_SeanceU15();
        
        }else if ($categorie == 'U10-U13') 
        {
            $seance->Creer_SeanceU13();
        }else
        {
            $zone1 = $_POST['positions1'];
            $zone2 = $_POST['positions2'];
            $seance->_zone1 = $zone1;
            $seance->_zone2 = $zone2;
            $seance->Creer_SeanceU6();
        }
    }
}
/*if(isset($_POST['positions1']))
{
    $zone1 = $_POST['positions1'];
    echo $zone1;
}
$seance = new CSeance();


echo $nom;
echo $categorie;*/
?>
