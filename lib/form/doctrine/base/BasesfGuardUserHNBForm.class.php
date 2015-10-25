<?php

/**
 * sfGuardUserHNB form base class.
 *
 * @method sfGuardUserHNB getObject() Returns the current form's model object
 *
 * @package    Web_Portals
 * @subpackage form
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserHNBForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'first_name'     => new sfWidgetFormInputText(),
      'last_name'      => new sfWidgetFormInputText(),
      'phone'          => new sfWidgetFormInputText(),
      'email_address'  => new sfWidgetFormInputText(),
      'username'       => new sfWidgetFormInputText(),
      'algorithm'      => new sfWidgetFormInputText(),
      'salt'           => new sfWidgetFormInputText(),
      'password'       => new sfWidgetFormInputText(),
      'is_active'      => new sfWidgetFormInputCheckbox(),
      'is_super_admin' => new sfWidgetFormInputCheckbox(),
      'last_login'     => new sfWidgetFormDateTime(),
      'pass_update_at' => new sfWidgetFormDateTime(),
      'is_lock_signin' => new sfWidgetFormInputCheckbox(),
      'locked_time'    => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'          => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email_address'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'username'       => new sfValidatorString(array('max_length' => 255)),
      'algorithm'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'salt'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'password'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_active'      => new sfValidatorBoolean(array('required' => false)),
      'is_super_admin' => new sfValidatorBoolean(array('required' => false)),
      'last_login'     => new sfValidatorDateTime(array('required' => false)),
      'pass_update_at' => new sfValidatorDateTime(array('required' => false)),
      'is_lock_signin' => new sfValidatorBoolean(array('required' => false)),
      'locked_time'    => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserHNB', 'column' => array('email_address'))),
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserHNB', 'column' => array('username'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_guard_user_hnb[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserHNB';
  }

}
