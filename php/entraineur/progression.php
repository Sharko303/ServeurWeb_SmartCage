<?php
    require_once "CProgression.php";
    require_once '../config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Progression - SmartCage</title>
</head>
<body>
        <form action="progression.php" method="post">
   Nom du joueur :
   <select name="nom" >
      <option value=0>Choisir
<?php
        $liste = new CProgression();
        $liste->_bdd = $bdd;
        $liste->afficherListe();
?>

   </select>
   <input type="submit" name="submit" value="Progression">
</form>
<?php
if(!empty($_POST['submit'])) // je verifie que le bouton "Progression a bien était activer"
{   
        if($_POST["nom"]=="0")
         {
            echo 'Choisir un joueur';
         }else
         {
            $liste->afficherJoueur();
            $liste->afficherGraph($joueur);
         }
}   
?>
</body>
</html>