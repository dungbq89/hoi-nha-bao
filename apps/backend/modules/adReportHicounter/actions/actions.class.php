<?php

require_once dirname(__FILE__).'/../lib/adReportHicounterGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adReportHicounterGeneratorHelper.class.php';

/**
 * adReportHicounter actions.
 *
 * @package    web_Portals
 * @subpackage adReportHicounter
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adReportHicounterActions extends autoAdReportHicounterActions
{
    public function executeIndex(sfWebRequest $request)
    {
        self::generateChart();
    }
    public function generateChart(){

        $datay=array(62,105,85,50);


// Create the graph. These two calls are always required
        $graph = new Graph(350,220,'auto');
        $graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
        $graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
        $graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels(array('A','B','C','D'));
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false,false);

// Create the bar plots
        $b1plot = new BarPlot($datay);

// ...and add it to the graPH
        $graph->Add($b1plot);


        $b1plot->SetColor("white");
//        $b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
        $b1plot->SetFillColor("#99D4E5");
        $b1plot->SetWidth(25);
        $graph->title->Set("Biểu đồ cột số lượng");

// Display the graph
       // $graph->Stroke();

        // Display the graph
        //        $graph->Stroke();
        $user = sfContext::getInstance()->getUser();
        $sFileName = '/hitcounter/'  . $user->getGuardUser()->getId(). '_bar_hitcounter.png';
        if (is_file(sfConfig::get('app_upload_media_file') . $sFileName)) {

            unlink(sfConfig::get('app_upload_media_file') . $sFileName);

        }
        $graph->Stroke('uploads' .$sFileName);


// Create the Pie Graph.
        $graph = new PieGraph(350,250);

        $theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
        $graph->title->Set("Biểu đồ tỷ lệ %");
        $graph->SetBox(true);

// Create
        $p1 = new PiePlot($datay);
        $graph->Add($p1);

        $p1->ShowBorder();
        $p1->SetColor('black');
        $p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));
        $user = sfContext::getInstance()->getUser();
        $sFileName = '/hitcounter/'  . $user->getGuardUser()->getId(). '_pie_hitcounter.png';
        if (is_file(sfConfig::get('app_upload_media_file') . $sFileName)) {

            unlink(sfConfig::get('app_upload_media_file') . $sFileName);

        }
        $graph->Stroke('uploads' .$sFileName);
    }
}
