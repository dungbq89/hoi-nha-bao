<?php

/**
 * AdArticlesCommentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdArticlesCommentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdArticlesCommentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdArticlesComment');
    }

    public static function getCommentArticleById($id){
        return AdArticlesCommentTable::getInstance()->createQuery()
            ->where('article_id=?',$id)
            ->andWhere('is_active=1')
            ->orderBy('created_at desc')
            ->fetchArray();
    }
}