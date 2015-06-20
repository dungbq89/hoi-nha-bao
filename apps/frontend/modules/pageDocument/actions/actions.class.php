<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/14/15
 * Time: 2:01 PM
 */
class pageDocumentActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $form=new documentForm();
        $user = sfContext::getInstance()->getUser();
        if ($request->hasParameter('page') && $user->getAttribute('searchDoc', false)) {
            $values = $request->getParameter($form->getName());
            $values['category']=$user->getAttribute('category');
            $values['keyword']=$user->getAttribute('keyword');
            $form->bind($values);
            $limit = 20;
            $user->setAttribute('searchDoc', true);
            $user->setAttribute('category', $values['category']);
            $user->setAttribute('keyword', $values['keyword']);

            $this->page = $request->getParameter('page', 1);
            $query = AdDocumentTable::getListDocument($values['category'],$values['keyword'],$limit);
            $pager = new sfDoctrinePager('AdDocument', $limit);
            $pager->setQuery($query);
            $pager->setPage($this->page);
            $pager->init();
            $this->pager = $pager;
            $this->listDocument = $this->pager->getResults();
        }

        if($request->isMethod('POST')){
            $values = $request->getParameter($form->getName());
            $form->bind($values);
            $limit = 20;
            $user->setAttribute('searchDoc', true);
            $user->setAttribute('category', $values['category']);
            $user->setAttribute('keyword', $values['keyword']);

            $this->page = $request->getParameter('page', 1);
            $query = AdDocumentTable::getListDocument($values['category'],$values['keyword'],$limit);
            $pager = new sfDoctrinePager('AdDocument', $limit);
            $pager->setQuery($query);
            $pager->setPage($this->page);
            $pager->init();
            $this->pager = $pager;
            $this->listDocument = $this->pager->getResults();
        }
        $this->form=$form;
    }
}