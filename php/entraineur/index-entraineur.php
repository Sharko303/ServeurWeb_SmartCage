<?php  
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

        <div class="sucess">
    <h1 style="margin-bottom: 10px">Bienvenue <?php echo $_SESSION['nom']; ?>!</h1>
    <img style="margin-bottom: 20px;" src="/ServeurWeb_SmartCage/images/fc_maurin.jpg">
    <p style="margin-bottom: 20px;">C'est votre espace entraineur.</p>
    <a href="/ServeurWeb_SmartCage/deconnexion.php">Déconnexion</a>
    </div>
    <footer style="text-align: center; margin-top: 20px;">
        <p> Retrouver toutes les infos (RÉSULTATS & CALENDRIERS DU CLUB LES ÉQUIPES)</p>

        <p>Rubrique Actualités Liens Utiles (FC Maurin) <a href="https://fc-maurin.footeo.com/"> ici </a></p>

 
        <p>Site Facebook FC Maurin</p>

        <p>Président : Marcel Aquaviva tel 06.10.03.66.24</p>

        <p>Trésorière : Carmen Leyzat tel</p>

        <p>06.88.20.44.58</p>
    </footer>
        </body>
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
        nav ul::after{
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
        </style>
</html>
