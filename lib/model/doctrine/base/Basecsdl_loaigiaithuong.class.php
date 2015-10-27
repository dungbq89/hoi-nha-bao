<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('csdl_loaigiaithuong', 'slave');

/**
 * Basecsdl_loaigiaithuong
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $madanhmuc
 * @property string $tendanhmuc
 * @property string $linhvuc
 * @property string $donvitochuc
 * @property string $gioithieu
 * @property string $anhdaidien
 * @property integer $thutu
 * @property boolean $trangthai
 * 
 * @method string              getMadanhmuc()   Returns the current record's "madanhmuc" value
 * @method string              getTendanhmuc()  Returns the current record's "tendanhmuc" value
 * @method string              getLinhvuc()     Returns the current record's "linhvuc" value
 * @method string              getDonvitochuc() Returns the current record's "donvitochuc" value
 * @method string              getGioithieu()   Returns the current record's "gioithieu" value
 * @method string              getAnhdaidien()  Returns the current record's "anhdaidien" value
 * @method integer             getThutu()       Returns the current record's "thutu" value
 * @method boolean             getTrangthai()   Returns the current record's "trangthai" value
 * @method csdl_loaigiaithuong setMadanhmuc()   Sets the current record's "madanhmuc" value
 * @method csdl_loaigiaithuong setTendanhmuc()  Sets the current record's "tendanhmuc" value
 * @method csdl_loaigiaithuong setLinhvuc()     Sets the current record's "linhvuc" value
 * @method csdl_loaigiaithuong setDonvitochuc() Sets the current record's "donvitochuc" value
 * @method csdl_loaigiaithuong setGioithieu()   Sets the current record's "gioithieu" value
 * @method csdl_loaigiaithuong setAnhdaidien()  Sets the current record's "anhdaidien" value
 * @method csdl_loaigiaithuong setThutu()       Sets the current record's "thutu" value
 * @method csdl_loaigiaithuong setTrangthai()   Sets the current record's "trangthai" value
 * 
 * @package    Web_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecsdl_loaigiaithuong extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('csdl_loaigiaithuong');
        $this->hasColumn('madanhmuc', 'string', 25, array(
             'type' => 'string',
             'comment' => 'Ma danh muc',
             'length' => 25,
             ));
        $this->hasColumn('tendanhmuc', 'string', 255, array(
             'type' => 'string',
             'comment' => 'ten danh muc',
             'length' => 255,
             ));
        $this->hasColumn('linhvuc', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Linh vuc giai thuong',
             'length' => 255,
             ));
        $this->hasColumn('donvitochuc', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Don vi to chuc',
             'length' => 255,
             ));
        $this->hasColumn('gioithieu', 'string', 500, array(
             'type' => 'string',
             'comment' => 'Gioi thieu',
             'length' => 500,
             ));
        $this->hasColumn('anhdaidien', 'string', 255, array(
             'type' => 'string',
             'comment' => 'hinh anh',
             'length' => 255,
             ));
        $this->hasColumn('thutu', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'Thu tu hien thi',
             'length' => 5,
             ));
        $this->hasColumn('trangthai', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trang thai',
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