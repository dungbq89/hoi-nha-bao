<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('sfGuardUserHNB', 'slave');

/**
 * BasesfGuardUserHNB
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email_address
 * @property string $username
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property timestamp $pass_update_at
 * @property boolean $is_lock_signin
 * @property integer $locked_time
 * @property Doctrine_Collection $sfGuardUserHoiVien
 * 
 * @method string              getFirstName()          Returns the current record's "first_name" value
 * @method string              getLastName()           Returns the current record's "last_name" value
 * @method string              getPhone()              Returns the current record's "phone" value
 * @method string              getEmailAddress()       Returns the current record's "email_address" value
 * @method string              getUsername()           Returns the current record's "username" value
 * @method string              getAlgorithm()          Returns the current record's "algorithm" value
 * @method string              getSalt()               Returns the current record's "salt" value
 * @method string              getPassword()           Returns the current record's "password" value
 * @method boolean             getIsActive()           Returns the current record's "is_active" value
 * @method boolean             getIsSuperAdmin()       Returns the current record's "is_super_admin" value
 * @method timestamp           getLastLogin()          Returns the current record's "last_login" value
 * @method timestamp           getPassUpdateAt()       Returns the current record's "pass_update_at" value
 * @method boolean             getIsLockSignin()       Returns the current record's "is_lock_signin" value
 * @method integer             getLockedTime()         Returns the current record's "locked_time" value
 * @method Doctrine_Collection getSfGuardUserHoiVien() Returns the current record's "sfGuardUserHoiVien" collection
 * @method sfGuardUserHNB      setFirstName()          Sets the current record's "first_name" value
 * @method sfGuardUserHNB      setLastName()           Sets the current record's "last_name" value
 * @method sfGuardUserHNB      setPhone()              Sets the current record's "phone" value
 * @method sfGuardUserHNB      setEmailAddress()       Sets the current record's "email_address" value
 * @method sfGuardUserHNB      setUsername()           Sets the current record's "username" value
 * @method sfGuardUserHNB      setAlgorithm()          Sets the current record's "algorithm" value
 * @method sfGuardUserHNB      setSalt()               Sets the current record's "salt" value
 * @method sfGuardUserHNB      setPassword()           Sets the current record's "password" value
 * @method sfGuardUserHNB      setIsActive()           Sets the current record's "is_active" value
 * @method sfGuardUserHNB      setIsSuperAdmin()       Sets the current record's "is_super_admin" value
 * @method sfGuardUserHNB      setLastLogin()          Sets the current record's "last_login" value
 * @method sfGuardUserHNB      setPassUpdateAt()       Sets the current record's "pass_update_at" value
 * @method sfGuardUserHNB      setIsLockSignin()       Sets the current record's "is_lock_signin" value
 * @method sfGuardUserHNB      setLockedTime()         Sets the current record's "locked_time" value
 * @method sfGuardUserHNB      setSfGuardUserHoiVien() Sets the current record's "sfGuardUserHoiVien" collection
 * 
 * @package    Web_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserHNB extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user');
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('email_address', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('username', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('algorithm', 'string', 255, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('salt', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('pass_update_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('is_lock_signin', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('locked_time', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('csdl_lylichhoivien as sfGuardUserHoiVien', array(
             'local' => 'id',
             'foreign' => 'hoivien_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}