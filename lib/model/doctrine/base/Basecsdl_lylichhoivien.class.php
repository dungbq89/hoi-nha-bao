<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('csdl_lylichhoivien', 'slave');

/**
 * Basecsdl_lylichhoivien
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $hoivien_id
 * @property string $ten
 * @property string $hodem
 * @property timestamp $ngaysinh
 * @property string $gioitinh
 * @property string $diachi
 * @property string $maquan
 * @property string $matinh
 * @property timestamp $ngayvaodoan
 * @property string $noiketnapdoan
 * @property timestamp $ngayvaodang
 * @property string $noiketnapdang
 * @property string $tieusu
 * @property integer $nghenghiep_id
 * @property integer $dantoc_id
 * @property string $quoctich
 * @property integer $donvi_id
 * @property string $images
 * @property string $dienthoai
 * @property string $email
 * @property sfGuardUserHNB $Groups
 * 
 * @method integer            getHoivienId()     Returns the current record's "hoivien_id" value
 * @method string             getTen()           Returns the current record's "ten" value
 * @method string             getHodem()         Returns the current record's "hodem" value
 * @method timestamp          getNgaysinh()      Returns the current record's "ngaysinh" value
 * @method string             getGioitinh()      Returns the current record's "gioitinh" value
 * @method string             getDiachi()        Returns the current record's "diachi" value
 * @method string             getMaquan()        Returns the current record's "maquan" value
 * @method string             getMatinh()        Returns the current record's "matinh" value
 * @method timestamp          getNgayvaodoan()   Returns the current record's "ngayvaodoan" value
 * @method string             getNoiketnapdoan() Returns the current record's "noiketnapdoan" value
 * @method timestamp          getNgayvaodang()   Returns the current record's "ngayvaodang" value
 * @method string             getNoiketnapdang() Returns the current record's "noiketnapdang" value
 * @method string             getTieusu()        Returns the current record's "tieusu" value
 * @method integer            getNghenghiepId()  Returns the current record's "nghenghiep_id" value
 * @method integer            getDantocId()      Returns the current record's "dantoc_id" value
 * @method string             getQuoctich()      Returns the current record's "quoctich" value
 * @method integer            getDonviId()       Returns the current record's "donvi_id" value
 * @method string             getImages()        Returns the current record's "images" value
 * @method string             getDienthoai()     Returns the current record's "dienthoai" value
 * @method string             getEmail()         Returns the current record's "email" value
 * @method sfGuardUserHNB     getGroups()        Returns the current record's "Groups" value
 * @method csdl_lylichhoivien setHoivienId()     Sets the current record's "hoivien_id" value
 * @method csdl_lylichhoivien setTen()           Sets the current record's "ten" value
 * @method csdl_lylichhoivien setHodem()         Sets the current record's "hodem" value
 * @method csdl_lylichhoivien setNgaysinh()      Sets the current record's "ngaysinh" value
 * @method csdl_lylichhoivien setGioitinh()      Sets the current record's "gioitinh" value
 * @method csdl_lylichhoivien setDiachi()        Sets the current record's "diachi" value
 * @method csdl_lylichhoivien setMaquan()        Sets the current record's "maquan" value
 * @method csdl_lylichhoivien setMatinh()        Sets the current record's "matinh" value
 * @method csdl_lylichhoivien setNgayvaodoan()   Sets the current record's "ngayvaodoan" value
 * @method csdl_lylichhoivien setNoiketnapdoan() Sets the current record's "noiketnapdoan" value
 * @method csdl_lylichhoivien setNgayvaodang()   Sets the current record's "ngayvaodang" value
 * @method csdl_lylichhoivien setNoiketnapdang() Sets the current record's "noiketnapdang" value
 * @method csdl_lylichhoivien setTieusu()        Sets the current record's "tieusu" value
 * @method csdl_lylichhoivien setNghenghiepId()  Sets the current record's "nghenghiep_id" value
 * @method csdl_lylichhoivien setDantocId()      Sets the current record's "dantoc_id" value
 * @method csdl_lylichhoivien setQuoctich()      Sets the current record's "quoctich" value
 * @method csdl_lylichhoivien setDonviId()       Sets the current record's "donvi_id" value
 * @method csdl_lylichhoivien setImages()        Sets the current record's "images" value
 * @method csdl_lylichhoivien setDienthoai()     Sets the current record's "dienthoai" value
 * @method csdl_lylichhoivien setEmail()         Sets the current record's "email" value
 * @method csdl_lylichhoivien setGroups()        Sets the current record's "Groups" value
 * 
 * @package    Web_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecsdl_lylichhoivien extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('csdl_lylich_hoivien');
        $this->hasColumn('hoivien_id', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'ma hoi vien',
             'length' => 5,
             ));
        $this->hasColumn('ten', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Tên hội viên',
             'length' => 255,
             ));
        $this->hasColumn('hodem', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Họ + tên hội viên',
             'length' => 255,
             ));
        $this->hasColumn('ngaysinh', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'ngay sinh cua hoi vien',
             'length' => 25,
             ));
        $this->hasColumn('gioitinh', 'string', 25, array(
             'type' => 'string',
             'comment' => 'Gioi tinh',
             'length' => 25,
             ));
        $this->hasColumn('diachi', 'string', 255, array(
             'type' => 'string',
             'comment' => 'dịa chỉ',
             'length' => 255,
             ));
        $this->hasColumn('maquan', 'string', 25, array(
             'type' => 'string',
             'comment' => 'Ma quan/huyen',
             'length' => 25,
             ));
        $this->hasColumn('matinh', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Ma tinh/thanh pho',
             'length' => 255,
             ));
        $this->hasColumn('ngayvaodoan', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'ngay vao doan',
             'length' => 25,
             ));
        $this->hasColumn('noiketnapdoan', 'string', 255, array(
             'type' => 'string',
             'comment' => 'nơi kết nạp đoàn',
             'length' => 255,
             ));
        $this->hasColumn('ngayvaodang', 'timestamp', 25, array(
             'type' => 'timestamp',
             'comment' => 'ngay vao dang',
             'length' => 25,
             ));
        $this->hasColumn('noiketnapdang', 'string', 255, array(
             'type' => 'string',
             'comment' => 'nơi kết nạp đảng',
             'length' => 255,
             ));
        $this->hasColumn('tieusu', 'string', 1000, array(
             'type' => 'string',
             'comment' => 'nơi kết nạp đảng',
             'length' => 1000,
             ));
        $this->hasColumn('nghenghiep_id', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'Danh muc nghe nghiep',
             'length' => 5,
             ));
        $this->hasColumn('dantoc_id', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'Danh muc dan toc',
             'length' => 5,
             ));
        $this->hasColumn('quoctich', 'string', 255, array(
             'type' => 'string',
             'comment' => 'quoc tich',
             'length' => 255,
             ));
        $this->hasColumn('donvi_id', 'integer', 5, array(
             'type' => 'integer',
             'comment' => 'don vị công tác',
             'length' => 5,
             ));
        $this->hasColumn('images', 'string', 255, array(
             'type' => 'string',
             'comment' => 'hinh anh',
             'length' => 255,
             ));
        $this->hasColumn('dienthoai', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Số điện thoại',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Email',
             'length' => 255,
             ));

        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUserHNB as Groups', array(
             'local' => 'hoivien_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}