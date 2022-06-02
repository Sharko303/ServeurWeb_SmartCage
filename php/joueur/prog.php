<?php
    require_once "../entraineur/CProgression.php";
    require_once '../config.php';

    session_start();
    

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
                    <li> <a href="prog.php"> Progression </a> </li>
                    <li> <a href="regle.php"> Règle </a> </li>
                    <li> <a href="/ServeurWeb_SmartCage/deconnexion.php"> Déconnexion </a> </li>
            </ul>
        </nav>
    </div>
            

<div class="graph">
<?php
if(!empty($_SESSION["nom"])) // je verifie que le bouton "Progression a bien était activer"
{   
            $liste= new CProgression();
            $joueur = $_SESSION["nom"];
            $liste->_bdd = $bdd;
            $liste->afficherGraph($joueur);
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