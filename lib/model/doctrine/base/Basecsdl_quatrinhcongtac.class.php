<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('csdl_quatrinhcongtac', 'slave');

/**
 * Basecsdl_quatrinhcongtac
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $hoivien_id
 * @property integer $donvi_id
 * @property integer $thoigian
 * @property timestamp $batdau
 * @property timestamp $ketthuc
 * @property string $chucvu
 * @property string $mota
 * 
 * @method integer              getHoivienId()  Returns the current record's "hoivien_id" value
 * @method integer              getDonviId()    Returns the current record's "donvi_id" value
 * @method integer              getThoigian()   Returns the current record's "thoigian" value
 * @method timestamp            getBatdau()     Returns the current record's "batdau" value
 * @method timestamp            getKetthuc()    Returns the current record's "ketthuc" value
 * @method string               getChucvu()     Returns the current record's "chucvu" value
 * @method string               getMota()       Returns the current record's "mota" value
 * @method csdl_quatrinhcongtac setHoivienId()  Sets the current record's "hoivien_id" value
 * @method csdl_quatrinhcongtac setDonviId()    Sets the current record's "donvi_id" value
 * @method csdl_quatrinhcongtac setThoigian()   Sets the current record's "thoigian" value
 * @method csdl_quatrinhcongtac setBatdau()     Sets the current record's "batdau" value
 * @method csdl_quatrinhcongtac setKetthuc()    Sets the current record's "ketthuc" value
 * @method csdl_quatrinhcongtac setChucvu()     Sets the current record's "chucvu" value
 * @method csdl_quatrinhcongtac setMota()       Sets the current record's "mota" value
 * 
 * @package    Web_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecsdl_quatrinhcongtac extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('csdl_quatrinh_congtac');
        $this->hasColumn('hoivien_id', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'ma hoi vien',
             'length' => 5,
             ));
        $this->hasColumn('donvi_id', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'don vị công tác',
             'length' => 5,
             ));
        $this->hasColumn('thoigian', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'thời gian công tác (tính theo tháng)',
             'length' => 5,
             ));
        $this->hasColumn('batdau', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'thoi gian bat dau',
             'length' => 25,
             ));
        $this->hasColumn('ketthuc', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'thoi gian ket thuc',
             'length' => 25,
             ));
        $this->hasColumn('chucvu', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Chức vụ',
             'length' => 255,
             ));
        $this->hasColumn('mota', 'string', 500, array(
             'type' => 'string',
             'comment' => 'Mô tả công việc',
             'length' => 500,
             ));

        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $vtblameable0 = new Doctrine_Template_VtBlameable();
        $this->actAs($timestampable0);
        $this->actAs($vtblameable0);
    }
}