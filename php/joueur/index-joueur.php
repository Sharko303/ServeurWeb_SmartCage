<?php
session_start();
 if(!isset($_SESSION["nom"]))
{
    header("Location: /SmartCage/connexion.php");
    exit(); 
  }
  ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Inscription</title>
        </head>
        <body>
        <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['nom']; ?>!</h1>
    <p>C'est votre espace joueur.</p>
    <a href="/SmartCage/deconnexion.php">Déconnexion</a>
    </div>
        </body>
</html>
