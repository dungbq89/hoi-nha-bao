<?php

/**
 * csdl_quatrinhcongtacTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class csdl_quatrinhcongtacTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object csdl_quatrinhcongtacTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('csdl_quatrinhcongtac');
    }

    public static function getQuaTrinhCongTac($hoiVienId)
    {
        return csdl_quatrinhcongtacTable::getInstance()->createQuery()
            ->where('hoivien_id =?',$hoiVienId);
    }
}