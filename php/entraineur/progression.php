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
                    <input type="radio" name="categorie" id="U7" value="U7";>U6/U7 
                    <input type="radio" name="categorie" id="U9" value="U9">U8/U9
                    <input type="radio" name="categorie" id="U13" value="U13">U10-U13
                    <input type="radio" name="categorie" id="U15+" value="U15+">U15+
                    </select> <br>
   Nom du joueur :
   <select name="nom" >
      <option value=0>Choisir
<?php
        $doc = new DomDocument;
        $categorie = $doc->getElementByID('U7');
        $liste = new CProgression();
        $liste->_categorie = $categorie;
        $liste->_bdd = $bdd;
        $liste->Joueur();
?>

   </select>
   <input type="submit" name="submit" value="Progression">
</form>
<div class="joueur">
<?php
if(!empty($_POST['submit'])) // je verifie que le bouton "Progression a bien était activer"
{   
        if($_POST["nom"]=="0")
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
        }
        .deroulant
        {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        </style>
</body>
</html>