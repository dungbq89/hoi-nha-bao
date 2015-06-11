<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/7/14
 * Time: 2:56 PM
 * To change this template use File | Settings | File Templates.
 */
class moduleArticleComponents extends sfComponents
{
    public function executeNewArticle(sfWebRequest $request){
        $limit = $this->getVar('limit');
        if (!isset($limit))
            $limit = 10;
        $attributes=$this->getVar('att');
        if (!isset($attributes))
            $attributes = 1;
        $articles = AdArticleTable::getRandomArticle($attributes,$limit);
        if($articles){
            $this->articles = $articles;
        }
        else{
            return sfView::NONE;
        }
    }

    public function executeHotArticle(sfWebRequest $request){
        $limit = $this->getVar('limit');
        if (!isset($limit))
            $limit = 10;
        $articles = AdArticleTable::getHotArticle($limit);
        if($articles){
            $this->articles = $articles;
        }
        else{
            return sfView::NONE;
        }
    }

    public function executeCategoryNews(sfWebRequest $request){
        $limit = $this->getVar('limit');
        if (!isset($limit))
            $limit = 10;
        $categories = AdCategoryTable::getCategoryFrontend($limit)->execute();
        if($categories){
            $this->categories = $categories;
        }
        else{
            return sfView::NONE;
        }
    }

    public function executeCategoryHot(sfWebRequest $request){
        $limit = $this->getVar('limit');
        if (!isset($limit))
            $limit = 5;
        $categories = AdCategoryTable::getCategoryFrontendHot($limit)->execute();
        if($categories){
            $this->categories = $categories;
        }
        else{
            return sfView::NONE;
        }
    }

}