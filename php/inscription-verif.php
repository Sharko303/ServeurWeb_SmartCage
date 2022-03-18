<?php 
    require_once 'config.php';; // On inclu la connexion à la bdd
    // On verifie si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        // Patch XSS
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $categorie = htmlspecialchars($_POST['categorie']);

        // On vérifie si l'utilisateur existe dans notre base de donnée
        $check = $bdd->prepare('SELECT nom, password, type FROM utilisateurs WHERE nom = ?');
        $check->execute(array($nom));
        $data = $check->fetch();
        $row = $check->rowCount();

        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas donc OK
        if($row == 0){ 
            if(strlen($nom) <= 100){ // On verifie que la longueur du nom <= 100
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe pour la sécurité du site
                            
                            $password = hash('sha256', $password);
                        

                            // On insère dans la base de données les informations du joueur
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, password, categorie, type) VALUES(:nom, :prenom, :password, :categorie, :type)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'password' => $password,
                                'categorie' => $categorie,
                                'type' => 'joueur',
                            ));

                            // On redirige sur une page avec le message de succès
                            header('Location:/SmartCage/joueur/index.php?reg_err=success');
                            die();
                        }else{ header('Location: /SmartCage/inscription.php?reg_err=password'); die();}
            }else{ header('Location: /SmartCage/inscription.php?reg_err=nom_length'); die();}
        }else{ header('Location: /SmartCage/inscription.php?reg_err=already'); die();}
    }