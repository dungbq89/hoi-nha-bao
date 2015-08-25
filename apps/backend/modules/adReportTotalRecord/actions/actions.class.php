<?php

require_once dirname(__FILE__).'/../lib/adReportTotalRecordGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adReportTotalRecordGeneratorHelper.class.php';

/**
 * adReportTotalRecord actions.
 *
 * @package    web_Portals
 * @subpackage adReportTotalRecord
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adReportTotalRecordActions extends autoAdReportTotalRecordActions
{
    public function generateChart(){

        $datay1 = array(20,15,23,15);
        $datay2 = array(12,9,42,8);
        $datay3 = array(5,17,32,24);
        $datay4 = array(10,27,22,42,50);

// Setup the graph
        $graph = new Graph(300,250);
        $graph->SetScale("textlin");

        $theme_class=new UniversalTheme;

        $graph->SetTheme($theme_class);
        $graph->img->SetAntiAliasing(false);
        $graph->title->Set('Filled Y-grid');
        $graph->SetBox(false);

        $graph->img->SetAntiAliasing();

        $graph->yaxis->HideZeroLabel();
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false,false);

        $graph->xgrid->Show();
        $graph->xgrid->SetLineStyle("solid");
        $graph->xaxis->SetTickLabels(array('A','B','C','D','E'));
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

        $p4 = new LinePlot($datay4);
        $graph->Add($p4);
        $p4->SetColor("#Aa1493");
        $p4->SetLegend('Line 4');

        $graph->legend->SetFrameWeight(1);

        // Display the graph
        //        $graph->Stroke();
        $user = sfContext::getInstance()->getUser();
        $sFileName = '/total_record/'  . $user->getGuardUser()->getId(). '_total_record.png';
        if (is_file(sfConfig::get('app_upload_media_file') . $sFileName)) {

            unlink(sfConfig::get('app_upload_media_file') . $sFileName);

        }
        $graph->Stroke('uploads' .$sFileName);

    }

    public function executeFilter(sfWebRequest $request)
    {
        //ngoctv: xoa file bieu do
        $user = sfContext::getInstance()->getUser();
        $sFileName = '/total_record/'  . $user->getGuardUser()->getId(). '_total_record.png';
        if (is_file(sfConfig::get('app_upload_media_file') . $sFileName)) {

            unlink(sfConfig::get('app_upload_media_file') . $sFileName);

        }
        //end delete file
        $this->setPage(1);

        if ($request->hasParameter('_reset'))
        {
            $this->setFilters($this->configuration->getFilterDefaults());
            $this->redirect('@ad_report_total_record');
        }

        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $filterValues = $request->getParameter($this->filters->getName());
        //ngoctv fix lỗi khi truyen action len url url/filter/action
        if($filterValues==null){
            $this->redirect('@ad_report_total_record');
        }
        //end
        foreach ($filterValues as $key => $value)
        {
            if (isset($filterValues[$key]['text']))
            {
                $filterValues[$key]['text'] = trim($filterValues[$key]['text']);
            }
        }

        $this->filters->bind($filterValues);
        if ($this->filters->isValid())
        {
            $this->setFilters($this->filters->getValues());

            self::generateChart($this->filters->getValues()); //ngoctv: tao bieu do thong ke
            $this->redirect('@ad_report_total_record');
        }
        $this->sidebar_status = null;// $this->configuration->getListSidebarStatus();
        $this->pager = null;//$this->getPager();
        $this->sort = null;//$this->getSort();

        $this->setTemplate('index');
    }

    public function executeIndex(sfWebRequest $request)
    {
        self::generateChart();
    }
}
