<?php

/**
 * pageNewsDetails actions.
 *
 * @package    Vt_Portals
 * @subpackage pageNewsDetails
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageNewsDetailsActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $slug = $request->getParameter('slug');
        if($slug){
            $article = AdArticleTable::getArticleBySlug($slug);
            if($article){
                $this->article = $article;
                $this->articleRelated = AdArticleTable::getListArticleRelated($article['id']);
            }
            else{
                return $this->redirect404();
            }

        }
        else{
            return $this->redirect404();
        }

    }

}
