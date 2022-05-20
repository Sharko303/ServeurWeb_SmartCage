<?php
require_once ('php/config.php');
require_once ('jpgraph-4.4.0/src/jpgraph.php');
require_once ('jpgraph-4.4.0/src/jpgraph_line.php');



        // On recupere le joueur
        $_joueur = $_REQUEST['joueur'];

        // On recupere d'abord l'id du joueur selectionné
        $req_id_joueur = 'SELECT Id_Utilisateur FROM utilisateurs WHERE nom ="'.$_joueur.'"'; // requete sql pour selectionné l'id du joueur
        $rep_id_joueur=$_bdd->query($req_id_joueur); // On récupére la reponse
        $id_joueur=$rep_id_joueur->fetch(); 
        //print_r($id_joueur[0]);

        // On va désormais chercher l'id des seance ou a participé notre joueur selectionné
        $req_id_seance = 'SELECT id_seance FROM participe WHERE id_utilisateur ="'.$id_joueur[0].'"'; //
        $rep_id_seance=$_bdd->query($req_id_seance); // On récupére la reponse
        $id_seance = array();
        // tant que nous avons une reponse nous continuons :
        while (false != ($result=$rep_id_seance->fetch())) 
        {
            $id_seance[] = $result['id_seance'];
        }

        // on va chercher le nombre de resultat obtenu avec un count
        $nb_seance = count($id_seance);
        
        // affichage pour vérifier le contenu
        for ($i=0; $i < $nb_seance; $i++) { 
            //echo $id_seance[$i];
        }

        $date = array();
        for ($i=0; $i < $nb_seance; $i++) 
        { 
            $req_date[$i] = 'SELECT date FROM seance WHERE id_seance ="'.$id_seance[$i].'"';
            $rep_date[$i]=$_bdd->query($req_date[$i]);
            $date[$i]=$rep_date[$i]->fetch();
            //print_r($date[$i][0]);
        }


        $datay1 = array(0,3,3,0);

        // Setup the graph
        $graph = new Graph(400,350);
        $graph->SetScale("textlin");

        $theme_class=new UniversalTheme;

        $graph->SetTheme($theme_class);
        $graph->img->SetAntiAliasing(false);
        $graph->title->Set('Progression');
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
        $p1->SetLegend('Tir');

        $graph->legend->SetFrameWeight(1);

        // Output line
        $graph->Stroke();
?>