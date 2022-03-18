<?php
   $host = 'localhost';
   $dbname = 'projet';
   $username = 'root';
   $password = 'smart';
      
   $dsn = "mysql:host=$host;dbname=$dbname"; 
   // récupérer tous les utilisateurs
$sql = 'SELECT nom, prenom, categorie FROM utilisateurs WHERE type = "joueur"';
    
   try{
    $bdd = new PDO($dsn, $username, $password);
    $stmt = $bdd->query($sql);
    
    if($stmt === false){
      die("Erreur");
    }
    
   }catch (PDOException $e){
      echo $e->getMessage();
   }
?>
