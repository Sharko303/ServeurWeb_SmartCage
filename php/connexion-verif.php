<?php
session_start();
 require_once 'config.php'; // On inclu la connexion à la bdd
 require_once 'CConnexion.php';
if(!empty($_POST['nom']) && !empty($_POST['password']))
    {
      $nom = htmlspecialchars($_POST['nom']);
      $password = htmlspecialchars($_POST['password']);
      $connexion = new CConnexion();
      $connexion->_nom = $nom;
      $connexion->_password = $password;
      $connexion->_bdd = $bdd;
      $connexion->verif();
}
?>