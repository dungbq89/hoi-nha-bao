<?php

/**
 * AdDocumentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdDocumentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdDocumentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdDocument');
    }

    //lay danh sach tai lieu theo chuyen muc
    public static function getDocumentByCatId($catId, $limit=null){
        $query = AdDocumentTable::getInstance()->createQuery()
            ->where('category_id =? ',$catId)
            ->andWhere('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('is_home=?',VtCommonEnum::NUMBER_ONE);
        if($limit){
            $query->limit($limit);
        }
        return $query;
    }

    //frontend
    public static function getListDocument($category, $keyword,$limit)
    {
        $query = AdDocumentTable::getInstance()->createQuery()
            ->select()
            ->orderBy('name asc')
            ->limit($limit);
            if ($category!="-1"){
                $query->andWhere('category_id=?',$category);
            }
            if ($category!="-1"){
                $query->andWhere('(LOWER(name) like LOWER(?)) OR (LOWER(document_number) like LOWER(?)) ', array('%' . trim($keyword) . '%','%' . trim($keyword) . '%'));
            }



        return $query;
    }

    //lay danh sach tai lieu hien thi trang chu
    public static function getDocumentHot($limit=null){
        $query = AdDocumentTable::getInstance()->createQuery()
            ->where('is_active=?',VtCommonEnum::NUMBER_ONE)
            ->andWhere('is_home=?',VtCommonEnum::NUMBER_ONE);
        if($limit){
            $query->limit($limit);
        }
        return $query;
    }
}