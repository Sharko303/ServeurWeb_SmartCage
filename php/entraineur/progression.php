<?php
    require_once "CProgression.php";
    require_once '../config.php';

    session_start();
    if(!isset($_SESSION["nom"])) // je vérifie si l'utilisateur a
    {
        header("Location: /ServeurWeb_SmartCage/connexion.php");
        exit(); 
      }
    if ($_SESSION["type"] == 'joueur')
    {
        header("Location: /ServeurWeb_SmartCage/php/interdit.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Progression - SmartCage</title>
</head>
<body>
    

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Inscription</title>
             <link rel="stylesheet" href="/ServeurWeb_SmartCage/css/style.css" media="screen" type="text/css" />
        </head>
        <body>
            <script>
                    
                    function afficherU15(etat)
                    {
                        document.getElementById("senior").style.visibility=etat;
                        document.getElementById("minime").style.visibility='hidden';
                        document.getElementById("benjamin").style.visibility='hidden';
                        document.getElementById("poussin").style.visibility='hidden';
                    }
                    function afficherU13(etat)
                    {
                        document.getElementById("senior").style.visibility='hidden';
                        document.getElementById("minime").style.visibility=etat;
                        document.getElementById("benjamin").style.visibility='hidden';
                        document.getElementById("poussin").style.visibility='hidden';
                    }
                    function afficherU9(etat)
                    {
                        document.getElementById("senior").style.visibility='hidden';
                        document.getElementById("minime").style.visibility='hidden';
                        document.getElementById("benjamin").style.visibility=etat;
                        document.getElementById("poussin").style.visibility='hidden';
                    }

                    function afficherU7(etat)
                    {
                        document.getElementById("senior").style.visibility='hidden';
                        document.getElementById("minime").style.visibility='hidden';
                        document.getElementById("benjamin").style.visibility='hidden';
                        document.getElementById("poussin").style.visibility=etat;
                    }
            </script>
            <div class="menu">
        <nav>   
            <ul>    
                    <li> <a href="joueur.php"> Joueur </a> </li>
                    <li> <a href="seance.php"> Séance </a> </li>
                    <li> <a href="/ServeurWeb_SmartCage/inscription.php"> Inscription </a> </li>
                    <li> <a href="/ServeurWeb_SmartCage/deconnexion.php"> Déconnexion </a> </li>
            </ul>
        </nav>
    </div>
        <form class="deroulant" action="progression.php" method="post">
            <label><b>Categorie :</b></label>       
                    <input type="radio" name="categorie" value="U7"onclick="afficherU7('visible');">U6/U7
                    <input type="radio" name="categorie" value="U9"onclick="afficherU9('visible');">U8/U9
                    <input type="radio" name="categorie" value="U13"onclick="afficherU13('visible');">U10-U13
                    <input type="radio" name="categorie" value="U15+" onclick="afficherU15('visible');">U15+
                    </select> <br>
      <div id="senior" style=" visibility:hidden;">U15
   <select name="nom" >
      <option value=0>Nom du joueur :
<?php
        $categorie = 'U15+';
        $liste = new CProgression();
        $liste->_categorie = $categorie;
        $liste->_bdd = $bdd;
        $liste->Joueur();
?>
      </option>
  </select>
   </div>
   
   <div id="minime" style=" visibility:hidden;">U13
   <select name="nom1" >
      <option value=0>Nom du joueur :
<?php
        $categorie = 'U13';
        $liste = new CProgression();
        $liste->_categorie = $categorie;
        $liste->_bdd = $bdd;
        $liste->Joueur();
?>
      </option>
  </select>
   </div>
   <div id="benjamin" style=" visibility:hidden; ">U9
   <select name="nom2" >
      <option value=0>Nom du joueur :
<?php
        $categorie = 'U9';
        $liste = new CProgression();
        $liste->_categorie = $categorie;
        $liste->_bdd = $bdd;
        $liste->Joueur();
?>
      </option>
  </select>
   </div>
   <div id="poussin" style=" visibility:hidden;">U7
   <select name="nom3" >
      <option value=0>Nom du joueur :
<?php
        $categorie = 'U7';
        $liste = new CProgression();
        $liste->_categorie = $categorie;
        $liste->_bdd = $bdd;
        $liste->Joueur();
?>
      </option>
  </select>
   </div>

   <input type="submit" class="submit" name="submit" value="Progression">
</form>
<div class="joueur">
<?php
if(!empty($_POST['submit'])) // je verifie que le bouton "Progression a bien était activer"
{   
        if($_POST["nom"]=="0" && $_POST["nom1"]=="0" && $_POST["nom2"]=="0" && $_POST["nom3"]=="0")
         {
            echo 'Choisir un joueur';
         }else
         {
            $joueur = $_POST["nom"];
            $liste->afficherJoueur();
           ?>
       </div>
           <div class="graph">
           <?php 
            $liste->afficherGraph($joueur);
         }
}   
?>
            </div>
<style>
            /* On reset le CSS afin d'enlever les bordure */
        body
        {
            background-color: grey;
        }
        *{
            padding: 0px;
            margin: 0px;
            font-family: Avenir,sans-serif;
        }
        nav
        {
            width: 100%;
            margin: 0 auto;
            position: sticky;
            top: 0px;
        }
        nav ul
        {
            list-style: none;
        }
        nav ul li
        {
            float: left;
            width: 25%;
            text-align: center;
            position: relative;
        }
        nav ul::after
        {
        content: "";
        display: table;
        clear: both;
        }
        nav a
        {
        display: block;
        text-decoration: none;
        font-family: "Comic Sans MS";    
        color: white;
        margin-left:;
        border-bottom: 2px solid transparent;
        padding: 25px 0px;
        background-color:black;

        }
        nav a:hover
        {
            color: white;
            border: 2px solid white;
        }
        .sucess
        {
            text-align: center;
            margin-top: 10px;
        }
        table
        {
            width: 90%;
            margin-left: 60px;
            margin-right: 60px;
        }
        .graph
        {
            margin-top: 20px;
            display: block;
            width: 90%;
            text-align: center;
            margin-right: auto;
            margin-left: auto;
        }
        .joueur
        {
            display: block;
            margin-top: 20px;
            margin-right: auto;
            margin-left: auto;
            text-align: center;
            width: 100px;
            font-size: 50px;
        }
        .deroulant
        {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        #benjamin, #senior, #minime, #poussin
        {
            display: block;
            text-align: center;
        }


        </style>
</body>
</html>