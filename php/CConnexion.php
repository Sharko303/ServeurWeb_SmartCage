
 <?php
require_once 'config.php';

class CConnexion
{
    function verif()
    {
      $_nom = $this->_nom;
      $_password = $this->_password;
      $_bdd = $this->_bdd;
      $_password = hash('sha256', $_password); // Je hash le mot de passe en sha256 comme nous avons utilisé cette algo dans notre bdd
   if(!empty($_nom) AND !empty($_password)) // Nous vérifions que notre variable n'est pas vide
   {
      // On vérifie que les 2 informations sont dans la base de donnée et juste
      $requser = $_bdd->prepare("SELECT * FROM utilisateurs WHERE nom = ? AND password = ?"); // on prend tout ce qu'il y a dans la table de notre utilisateur mot de passe
      $requser->execute(array($_nom, $_password)); // on exécute le tableau de nos variable dans notre base de donnée
      $userexist = $requser->rowCount();
      // Si elles sont juste alors l'utilisateur existe donc on entre dans notre condition
      if($userexist == 1) 
      {
         $userinfo = $requser->fetch();
         $_SESSION['Id_Utilisateur'] = $userinfo['Id_Utilisateur'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['type'] = $userinfo['type'];
         if ($_SESSION['type'] == 'admin') // si utilisateur est un admin
         {
            header('location: admin/index-admin.php');      
         }
         if ($_SESSION['type'] == 'entraineur') // si utilisateur est un entraineneur
         {
            header('location: entraineur/index-entraineur.php');
         }
         if($_SESSION['type'] == 'joueur') // si utilisateur est un joueur
         {
            header('Location: joueur/index-joueur.php');
         }
      }else 
      {
         $erreur = "Mauvais nom ou mot de passe !"; // sinon l'utilisateur n'existe pas
      }
   } else {
      $erreur = "Erreur"; // sinon on affecte notre variable erreur
   }
   if(isset($erreur)) // si notre variable erreur n'est pas vide alors
      {
            header('Location: /SmartCage/connexion.php?login_err=password'); // affiche l'erreur
         }
   }
   function deconnexion()
   {
      session_start();
      session_unset();
      session_destroy();
      header('Location: /ServeurWeb_SmartCage/index.html');
      exit();
   }
}
?>