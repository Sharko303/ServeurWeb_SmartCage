<?php
require_once '../config.php'; // ajout de la base de donnée
require_once 'Cseance.php'

$nom = htmlspecialchars($_POST['nom']);
$categorie = htmlspecialchars($_POST['categorie']);
$seance = new CSeance();
if (isset($nom)) 
{
    if (isset($categorie)) 
    {
        if ($categorie == 'U15+') 
        {
            $seance->Creer_SeanceU15();
        
        }else if ($categorie == 'U10-U13') 
        {
            $seance->Creer_SeanceU13();
        }else
        {
            $seance->Creer_SeanceU6();
        }
    }
}

?>
