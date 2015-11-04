<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('csdl_ngoaingu', 'slave');

/**
 * Basecsdl_ngoaingu
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * 
 * @method string        getName() Returns the current record's "name" value
 * @method csdl_ngoaingu setName() Sets the current record's "name" value
 * 
 * @package    Web_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecsdl_ngoaingu extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('csdl_ngoaingu');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'comment' => 'ten ngoai ngu',
             'length' => 255,
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