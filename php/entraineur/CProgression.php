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
require_once ('phpChart_Lite/conf.php');
include("pChart2.1.4/class/pData.class.php");
include("pChart2.1.4/class/pDraw.class.php");
include("pChart2.1.4/class/pImage.class.php");


class CProgression
{
    private $_joueur;
    private $_identifiant;

    function afficherListe()
        {
            $_bdd = $this->_bdd;
            $sql = "SELECT nom FROM utilisateurs WHERE type = 'joueur'";
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
       $graph = new pData();
       $graph->addPoints(array(VOID,3,4,3,5));
       $image = new pImage(700,230,$graph);
       $image->setGraphArea(60,40,670,190);
       $image->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>11));
       $image->drawScale();
       $image->drawSplineChart();
       $image->Stroke();
    }
}
?>
