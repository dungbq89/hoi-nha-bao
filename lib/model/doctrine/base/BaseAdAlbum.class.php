<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdAlbum', 'doctrine');

/**
 * BaseAdAlbum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property timestamp $event_date
 * @property integer $priority
 * @property boolean $is_active
 * @property boolean $is_default
 * @property string $image_path
 * @property string $lang
 * @property string $slug
 * @property Doctrine_Collection $AlbumPhoto
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method timestamp           getEventDate()   Returns the current record's "event_date" value
 * @method integer             getPriority()    Returns the current record's "priority" value
 * @method boolean             getIsActive()    Returns the current record's "is_active" value
 * @method boolean             getIsDefault()   Returns the current record's "is_default" value
 * @method string              getImagePath()   Returns the current record's "image_path" value
 * @method string              getLang()        Returns the current record's "lang" value
 * @method string              getSlug()        Returns the current record's "slug" value
 * @method Doctrine_Collection getAlbumPhoto()  Returns the current record's "AlbumPhoto" collection
 * @method AdAlbum             setName()        Sets the current record's "name" value
 * @method AdAlbum             setDescription() Sets the current record's "description" value
 * @method AdAlbum             setEventDate()   Sets the current record's "event_date" value
 * @method AdAlbum             setPriority()    Sets the current record's "priority" value
 * @method AdAlbum             setIsActive()    Sets the current record's "is_active" value
 * @method AdAlbum             setIsDefault()   Sets the current record's "is_default" value
 * @method AdAlbum             setImagePath()   Sets the current record's "image_path" value
 * @method AdAlbum             setLang()        Sets the current record's "lang" value
 * @method AdAlbum             setSlug()        Sets the current record's "slug" value
 * @method AdAlbum             setAlbumPhoto()  Sets the current record's "AlbumPhoto" collection
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdAlbum extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_album');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Tên Album',
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Giới thiệu album',
             'length' => 1000,
             ));
        $this->hasColumn('event_date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => true,
             'comment' => 'Ngày diễn ra sự kiện',
             'length' => 25,
             ));
        $this->hasColumn('priority', 'integer', 5, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => 'Độ ưu tiên hiển thị',
             'length' => 5,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trạng thái hiển thị (0: Chưa kích hoạt, 1: đã kích hoạt)',
             ));
        $this->hasColumn('is_default', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             'comment' => 'Trạng thái mặc định để hiển thị, 1: hiển thị, 0: không hiển thị.',
             ));
        $this->hasColumn('image_path', 'string', 255, array(
             'type' => 'string',
             'comment' => 'Đường dẫn ảnh đại diện',
             'length' => 255,
             ));
        $this->hasColumn('lang', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Đa ngôn ngữ',
             'length' => 10,
             ));
        $this->hasColumn('slug', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'comment' => 'chuyển đổi url',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AdPhoto as AlbumPhoto', array(
             'local' => 'id',
             'foreign' => 'album_id'));

        $vtblameable0 = new Doctrine_Template_VtBlameable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($vtblameable0);
        $this->actAs($timestampable0);
    }
}