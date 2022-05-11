<?php
/**
 *  classe premetante a visualiser la progression d'un joueur.
 */
/**
 * 
 */
require_once '../config.php';
require_once ('../../jpgraph-4.4.0/src/jpgraph.php');
require_once ('../../jpgraph-4.4.0/src/jpgraph_line.php');
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
        $datay1 = array(20,15,23,15);
        $datay2 = array(12,9,42,8);
        $datay3 = array(5,17,32,24);

        // Setup the graph
        $graph = new Graph(300,250);
        $graph->SetScale("textlin");

        $theme_class=new UniversalTheme;

        $graph->SetTheme($theme_class);
        $graph->img->SetAntiAliasing(false);
        $graph->title->Set('Filled Y-grid');
        $graph->SetBox(false);

        $graph->SetMargin(40,20,36,63);

        $graph->img->SetAntiAliasing();

        $graph->yaxis->HideZeroLabel();
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false,false);

        $graph->xgrid->Show();
        $graph->xgrid->SetLineStyle("solid");
        $graph->xaxis->SetTickLabels(array('A','B','C','D'));
        $graph->xgrid->SetColor('#E3E3E3');

        // Create the first line
        $p1 = new LinePlot($datay1);
        $graph->Add($p1);
        $p1->SetColor("#6495ED");
        $p1->SetLegend('Line 1');

        // Create the second line
        $p2 = new LinePlot($datay2);
        $graph->Add($p2);
        $p2->SetColor("#B22222");
        $p2->SetLegend('Line 2');

        // Create the third line
        $p3 = new LinePlot($datay3);
        $graph->Add($p3);
        $p3->SetColor("#FF1493");
        $p3->SetLegend('Line 3');

        $graph->legend->SetFrameWeight(1);

        // Output line
        $graph->Stroke();
    }
}
?>
