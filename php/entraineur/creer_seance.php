<?php
require_once '../config.php'; // ajout de la base de donnée
require_once 'Cseance.php';

$nom = htmlspecialchars($_POST['nom']);
$categorie = htmlspecialchars($_POST['categorie']);
$seance = new CSeance();
$seance->_bdd = $bdd;
$seance->_nom = $nom;
$seance->_categorie = $categorie;
if (isset($nom)) 
{
    if (isset($categorie)) 
    {
        if ($categorie == 'U15+') 
        {
            $zone1 = $_POST['positions1'];
            /*$zone2 = $_POST['positions2'];
            $zone3 = $_POST['positions3'];
            $zone4 = $_POST['positions4'];
            $zone5 = $_POST['positions5'];
            $zone6 = $_POST['positions6'];
            $zone7 = $_POST['positions7'];
            $zone8 = $_POST['positions8'];
            $zone9 = $_POST['positions9'];*/
            $seance->_zone1 = $zone1;
            /*$seance->_zone2 = $zone2;
            $seance->_zone3 = $zone3;
            $seance->_zone4 = $zone4;
            $seance->_zone5 = $zone5;
            $seance->_zone6 = $zone6;
            $seance->_zone7 = $zone7;
            $seance->_zone8 = $zone8;
            $seance->_zone9 = $zone9;*/
            $seance->Creer_SeanceU15();
        
        }else if ($categorie == 'U10-U13') 
        {
            $zone1 = $_POST['positions1'];
            $zone2 = $_POST['positions2'];
            $zone3 = $_POST['positions3'];
            $zone4 = $_POST['positions4'];
            $seance->_zone1 = $zone1;
            $seance->_zone2 = $zone2;
            $seance->_zone3 = $zone3;
            $seance->_zone4 = $zone4;
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
