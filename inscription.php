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
            <title>Inscription</title>
        </head>
        <body>
        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            <div id="container">
            <form action="php/inscription-verif.php" method="post">
                <h1>Inscrire un Joueur</h1>
                    <label><b>Nom (aussi utiliser pour ce connecter)</b></label>       
                    <input type="text" name="nom" placeholder="Nom" required="required" autocomplete="off">
                    <label><b>Prenom</b></label>       
                    <input type="text" name="prenom" placeholder="Prenom" required="required" autocomplete="off">
                    <label><b>Categorie :</b></label>       
                    <select name="categorie" class="categorie">
                    <option value="aucune">aucune</option>
                    <option value="U7">U6/U7</option>
                    <option value="U9">U8/U9</option>
                    <option value="U13">U10-U13</option>
                    <option value="U15+">U15+</option>
                    </select> <br>
                    <label><b>Mot de passe</b></label>
                    <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
                    <label><b>Re-tapez le mot de passe</b></label>
                    <input type="password" name="password_retype" placeholder="Mot de passe" required="required" autocomplete="off">
                    <input type="submit" id='submit' value='INSCRIPTION' name="submit">
                    <a class="inscr" href="connexion.php">Connexion</a>
            </form>
        </div>
        <style>
        body
            {
                background-color: grey;
            }
        #container
            {
                width:400px;
                margin:0 auto;
                margin-top:5%;
            }
            /* Bordered form */
            form 
            {
                width:100%;
                padding: 30px;
                border: 1px solid #f1f1f1;
                background: #fff;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            #container h1
            {
                width: 100%;
                text-align: center;
                margin: 0 auto;
                padding-bottom: 10px;
            }

            /* Full-width pour les inputs */
            input[type=text], input[type=password] 
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* style pour tous les buttons */
            input[type=submit] {
                background-color: black;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            input[type=submit]:hover {
                background-color: white;
                color: black;
                border: 1px solid black;
            }
            .alert
            {
                background-color: red;
                width:360px;
                margin:0 auto;
                margin-top:0%;
                /*style*/
                color: white;
                padding: 14px 20px;
                border: 10px;
                cursor: pointer;
            }
            .inscr
            {
                color:  black;
                margin-left:42%;
            }
            .categorie
            {
                text-align: center;
                width: 20%;
                margin-left: 20px;
                margin-bottom: 10px;
            }
        </style>
        </body>
</html>
