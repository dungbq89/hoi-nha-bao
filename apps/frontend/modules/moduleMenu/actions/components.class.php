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
        $footerMenu=VtpMenuTable::getMenu();
        if (!count($footerMenu))
            return sfView::NONE;
        $this->footerMenu=$footerMenu;
    }
}