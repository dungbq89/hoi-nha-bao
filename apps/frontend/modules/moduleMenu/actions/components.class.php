<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 11:08 AM
 * To change this template use File | Settings | File Templates.
 */
class moduleMenuComponents extends sfComponents
{
    public function executeMainMenu()
    {
        $request=sfContext::getInstance()->getRequest();
        $this->slug_menu=$request->getParameter('slug_menu');
        $mainMenu=AdCategoryTable::getMenu();
        if (!count($mainMenu))
            return sfView::NONE;
        $this->mainMenu=$mainMenu;
    }

    public function executeFooterMenu()
    {
        $footerMenu=AdMenuTable::getMenu();
        if (!count($footerMenu))
            return sfView::NONE;
        $this->footerMenu=$footerMenu;
    }

    public function executeLinkRight(){
        $listLink = AdLinkTable::getLink(1);
        if($listLink){
            $this->links = $listLink;
        }
        else{
            return sfView::NONE;
        }
    }

    public function executeLinkFooter(){
        $listLink = AdLinkTable::getLink(2);
        if($listLink){
            $this->links = $listLink;
        }
        else{
            return sfView::NONE;
        }
    }

    public function executeContentFooter(){
        $footerId = sfConfig::get('app_footer_id');
        if($footerId){
            $content = AdHtmlTable::getHtmlById($footerId);
            if($content){
                $this->content = $content->content;
            }else{
                return sfView::NONE;
            }

        }
        else{
            return sfView::NONE;
        }
    }
}