<?php

/**
 * csdl_lichcongtacTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class csdl_lichcongtacTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object csdl_lichcongtacTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('csdl_lichcongtac');
    }

    public static function getCalendarByDay($hoivien_id,$day){
        $q=csdl_lichcongtacTable::getInstance()->createQuery()
            ->select('*')
            ->andWhere('start_time >= ?', date('Y-m-d 00:00:00',strtotime($day)))
            ->andWhere('start_time <= ?', date('Y-m-d 23:59:59',strtotime($day)))
            ->orderby('start_time asc');
        if($hoivien_id>0){
            $q->andWhere('hoivien_id=?',$hoivien_id);
        }
        return $q->execute();
    }
}