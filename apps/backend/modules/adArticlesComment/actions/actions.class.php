<?php

require_once dirname(__FILE__).'/../lib/adArticlesCommentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adArticlesCommentGeneratorHelper.class.php';

/**
 * adArticlesComment actions.
 *
 * @package    Web_Portals
 * @subpackage adArticlesComment
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adArticlesCommentActions extends autoAdArticlesCommentActions
{
    public static function getArticleName($articleId){
        $article=AdArticleTable::getArticleById($articleId);
        if ($article){
            return $article->title;
        }
        else{
            return '';
        }
    }
}
