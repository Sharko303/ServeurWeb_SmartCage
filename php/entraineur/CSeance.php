<?php
/**
 *  classe premetante a visualiser la progression d'un joueur.
 */
/**
 * 
 */
require_once '../config.php';
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

class CSeance
{
    private $_joueur;
    private $_identifiant;

    function afficherListe()
        {
            $_bdd = $this->_bdd;
            $sql = "SELECT nom FROM utilisateurs WHERE type = 'entraineur'";
            //$liste = $bdd->query($sql) as $bdd);
            $liste = $_bdd->query($sql);
            while ($donnees = $liste->fetch())
            {
                $nomselect = $donnees['nom'];
                echo "<OPTION VALUE=\"$nomselect\">".$nomselect.'</option>';
            } 
        }

    function afficherJoueur()
    {
            $_joueur = htmlspecialchars($_POST['nom']);
            echo $_joueur;
            $liste = new CProgression();
    }

    function afficherGraph($joueur)
    {
        $graph = new Graph(900,500);

        // Réprésentation linéaire

        $graph->SetScale("textlin");

        // Fixer les marges

        $graph->img->SetMargin(40,30,50,120);

        // Création du graphique histogramme

        $bplot = new BarPlot($tableauNb);

        // Ajouter les barres au conteneur

        $graph->Add($bplot);

        // Spécification des couleurs des barres

        $bplot->SetFillColor(array('#5EB6DD'));

        // Afficher les valeurs pour chaque barre

        $bplot->value->Show();

        // Modifier le rendu de chaque valeur

        $bplot->value->SetFormat('%d');

        // Le titre

        $graph->title->Set("Inventaire Télédistribution");

        $graph->title->SetFont(FF_ARIAL,FS_BOLD);

        // Taille réduite pour l'axe horizontal(axe x) et vertical (axe y) et mise à 45° des labels

        $graph->xaxis->SetTickLabels($tableauElement);

        $graph->xaxis->SetLabelAngle(45);

        $graph->xaxis->SetFont(FF_ARIAL,FS_BOLD,6);

        $graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,6);

        // Afficher le graphique

        $graph->Stroke();     
    }
    
    /*function Creer_SeanceU15()
    {
        $i = 1;
        $_zonetir = '';
        $btn1= 'bouton1';
        $btn2= 'bouton2';
        $btn3= 'bouton3';
        $btn4= 'bouton4';
        $btn5= 'bouton5';
        $btn6= 'bouton6';
        $btn7= 'bouton7';
        $btn8= 'bouton8';
        $btn9= 'bouton9';
        while ($i <= 9)
        {
            if (isset($btn$i)) 
                {
                    $_zonetir=$_zonetir','$btn$i;
                    $i++;
                }
        }
        if (isset($zonetir)) 
        {
            $check = $bdd->prepare('SELECT nom, categorie, zone_tir FROM seance WHERE nom = ?');
            $check->execute(array($nom));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row == 0)
                {
                    // On insère dans la base de données les informations de la seance
                            $insert = $bdd->prepare('INSERT INTO seance(nom, categorie, zone_tir) VALUES(:nom, :categorie, :zone_tir)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'categorie' => $categorie,
                                   'zone_tir' => $zone_tir,
                            ));
                }
            }
        }
    function Creer_SeanceU13()
    {
        $i = 1;
        $_zonetir = '';
        $btn1= 'bouton1';
        $btn2= 'bouton2';
        $btn3= 'bouton3';
        $btn4= 'bouton4';

        while ($i <= 4, i++)
        {
            if (isset($btn$i)) 
                {
                    $_zonetir=$_zonetir','$btn$i;
                    $i++;
                }
        }
        if (isset($zonetir)) 
        {
            $check = $bdd->prepare('SELECT nom, categorie, zone_tir FROM seance WHERE nom = ?');
            $check->execute(array($nom));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row == 0)
                {
                    // On insère dans la base de données les informations de la seance
                            $insert = $bdd->prepare('INSERT INTO seance(nom, categorie, zone_tir) VALUES(:nom, :categorie, :zone_tir)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'categorie' => $categorie,
                                   'zone_tir' => $zone_tir,
                            ));
                }
            }
        }
    function Creer_SeanceU6()
    {
        $i = 1;
        $_zonetir = '';
        $btn1= 'bouton1';
        $btn2= 'bouton2';

        while ($i <= 2, i++)
        {
            if (isset($btn$i)) 
                {
                    $_zonetir=$_zonetir','$btn$i;
                    $i++;
                }
        }
        if (isset($zonetir)) 
        {
            $check = $bdd->prepare('SELECT nom, categorie, zone_tir FROM seance WHERE nom = ?');
            $check->execute(array($nom));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row == 0)
                {
                    // On insère dans la base de données les informations de la seance
                            $insert = $bdd->prepare('INSERT INTO seance(nom, categorie, zone_tir) VALUES(:nom, :categorie, :zone_tir)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'categorie' => $categorie,
                                   'zone_tir' => $zone_tir,
                            ));
                }
            }
        }*/
    }
?>
