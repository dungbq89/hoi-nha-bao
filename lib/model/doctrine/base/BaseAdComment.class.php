<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdComment', 'doctrine');

/**
 * BaseAdComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $full_name
 * @property string $phone_number
 * @property string $email
 * @property string $description
 * @property timestamp $create_date
 * 
 * @method string    getTitle()        Returns the current record's "title" value
 * @method string    getFullName()     Returns the current record's "full_name" value
 * @method string    getPhoneNumber()  Returns the current record's "phone_number" value
 * @method string    getEmail()        Returns the current record's "email" value
 * @method string    getDescription()  Returns the current record's "description" value
 * @method timestamp getCreateDate()   Returns the current record's "create_date" value
 * @method AdComment setTitle()        Sets the current record's "title" value
 * @method AdComment setFullName()     Sets the current record's "full_name" value
 * @method AdComment setPhoneNumber()  Sets the current record's "phone_number" value
 * @method AdComment setEmail()        Sets the current record's "email" value
 * @method AdComment setDescription()  Sets the current record's "description" value
 * @method AdComment setCreateDate()   Sets the current record's "create_date" value
 * 
 * @package    Web_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_comment');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Tiêu đề',
             'length' => 255,
             ));
        $this->hasColumn('full_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Ho ten nguoi gop y',
             'length' => 255,
             ));
        $this->hasColumn('phone_number', 'string', 25, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 25,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 500, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 500,
             ));
        $this->hasColumn('create_date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'comment' => 'Ngày tạo',
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}