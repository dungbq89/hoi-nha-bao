<?php

/**
 * csdl_dantocTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class csdl_dantocTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object csdl_dantocTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('csdl_dantoc');
    }

    public static function getDanToc()
    {
        return csdl_dantocTable::getInstance()->createQuery()
            ->orderBy('tendantoc desc');
    }
}