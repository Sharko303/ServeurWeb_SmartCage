<?php
require_once 'php/config.php';
$tab = array();

// boucle 
for ($i=0; $i < 10; $i++) 
{ 
    $tab[$i] = $i;
}

//Affichage

$max = count($tab); //récupère nombre d'élement de notre tableau

for ($i=0; $i < $max; $i++) { 
    echo $tab[$i].'<br/>';//affichage
}
?>