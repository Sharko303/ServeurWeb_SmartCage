<?php  
session_start();
if(!isset($_SESSION["nom"])) // je vérifie si l'utilisateur a
{
    header("Location: /SmartCage/connexion.php");
    exit(); 
  }
if ($_SESSION["type"] == 'joueur')
{
    header("Location: /SmartCage/php/interdit.php");
}
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Admin - SmartCage</title>
        </head>
    <body>
        <div class="sucess">
            <h1>Bienvenue <?php echo $_SESSION['nom']; ?>!</h1>
            <p>C'est votre espace admin.</p>
            <a href="/SmartCage/deconnexion.php">Déconnexion</a>
        </div>
    </body>
</html>
