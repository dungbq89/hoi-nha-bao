<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('csdl_lichcongtac', 'slave');

/**
 * Basecsdl_lichcongtac
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $hoivien_id
 * @property string $tieude
 * @property string $noidung
 * @property timestamp $start_time
 * @property timestamp $end_time
 * @property string $diadiem
 * @property string $thanhphan
 * @property string $chuanbi
 * @property string $chutri
 * 
 * @method integer          getHoivienId()  Returns the current record's "hoivien_id" value
 * @method string           getTieude()     Returns the current record's "tieude" value
 * @method string           getNoidung()    Returns the current record's "noidung" value
 * @method timestamp        getStartTime()  Returns the current record's "start_time" value
 * @method timestamp        getEndTime()    Returns the current record's "end_time" value
 * @method string           getDiadiem()    Returns the current record's "diadiem" value
 * @method string           getThanhphan()  Returns the current record's "thanhphan" value
 * @method string           getChuanbi()    Returns the current record's "chuanbi" value
 * @method string           getChutri()     Returns the current record's "chutri" value
 * @method csdl_lichcongtac setHoivienId()  Sets the current record's "hoivien_id" value
 * @method csdl_lichcongtac setTieude()     Sets the current record's "tieude" value
 * @method csdl_lichcongtac setNoidung()    Sets the current record's "noidung" value
 * @method csdl_lichcongtac setStartTime()  Sets the current record's "start_time" value
 * @method csdl_lichcongtac setEndTime()    Sets the current record's "end_time" value
 * @method csdl_lichcongtac setDiadiem()    Sets the current record's "diadiem" value
 * @method csdl_lichcongtac setThanhphan()  Sets the current record's "thanhphan" value
 * @method csdl_lichcongtac setChuanbi()    Sets the current record's "chuanbi" value
 * @method csdl_lichcongtac setChutri()     Sets the current record's "chutri" value
 * 
 * @package    Web_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecsdl_lichcongtac extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('csdl_lichcongtac');
        $this->hasColumn('hoivien_id', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'ma hoi vien',
             'length' => 5,
             ));
        $this->hasColumn('tieude', 'string', 255, array(
             'type' => 'string',
             'comment' => 'tieu de',
             'length' => 255,
             ));
        $this->hasColumn('noidung', 'string', 500, array(
             'type' => 'string',
             'comment' => 'Noi dung',
             'length' => 500,
             ));
        $this->hasColumn('start_time', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'Thời gian bắt đầu',
             'length' => 25,
             ));
        $this->hasColumn('end_time', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'Thời gian kết thúc',
             'length' => 25,
             ));
        $this->hasColumn('diadiem', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Dia diem',
             'length' => 255,
             ));
        $this->hasColumn('thanhphan', 'string', 500, array(
             'type' => 'string',
             'comment' => 'thanh phan tham du',
             'length' => 500,
             ));
        $this->hasColumn('chuanbi', 'string', 500, array(
             'type' => 'string',
             'comment' => 'Ca nhan/don vi chuan bi',
             'length' => 500,
             ));
        $this->hasColumn('chutri', 'string', 500, array(
             'type' => 'string',
             'comment' => 'Ca nhan/don vi chu tri',
             'length' => 500,
             ));

        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $vtblameable0 = new Doctrine_Template_VtBlameable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($vtblameable0);
        $this->actAs($timestampable0);
    }
}