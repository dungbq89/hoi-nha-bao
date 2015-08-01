<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 7/28/15
 * Time: 11:36 PM
 */

class registerForm extends Basecsdl_lylichhoivienForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'id'            => new sfWidgetFormInputHidden(),
            'hoivien_id'    => new sfWidgetFormInputText(),
            'ten'           => new sfWidgetFormInputText(),
            'hodem'         => new sfWidgetFormInputText(),
            'ngaysinh'      => new sfWidgetFormDateTime(array('with_time'=>false)),
            'gioitinh'      => new sfWidgetFormInputText(),
            'diachi'        => new sfWidgetFormInputText(),
            'maquan'        => new sfWidgetFormInputText(),
            'matinh'        => new sfWidgetFormInputText(),
            'ngayvaodoan'   => new sfWidgetFormDateTime(),
            'noiketnapdoan' => new sfWidgetFormInputText(),
            'ngayvaodang'   => new sfWidgetFormDateTime(),
            'noiketnapdang' => new sfWidgetFormInputText(),
            'tieusu'        => new sfWidgetFormTextarea(),
            'nghenghiep_id' => new sfWidgetFormInputText(),
            'dantoc_id'     => new sfWidgetFormInputText(),
            'quoctich'      => new sfWidgetFormInputText(),
            'donvi_id'      => new sfWidgetFormInputText(),
            'created_at'    => new sfWidgetFormDateTime(),
            'updated_at'    => new sfWidgetFormDateTime(),
        ));

        $this->setValidators(array(
            'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'hoivien_id'    => new sfValidatorInteger(array('required' => false)),
            'ten'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'hodem'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'ngaysinh'      => new sfValidatorDateTime(array('required' => false)),
            'gioitinh'      => new sfValidatorString(array('max_length' => 25, 'required' => false)),
            'diachi'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'maquan'        => new sfValidatorString(array('max_length' => 25, 'required' => false)),
            'matinh'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'ngayvaodoan'   => new sfValidatorDateTime(array('required' => false)),
            'noiketnapdoan' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'ngayvaodang'   => new sfValidatorDateTime(array('required' => false)),
            'noiketnapdang' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'tieusu'        => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
            'nghenghiep_id' => new sfValidatorInteger(array('required' => false)),
            'dantoc_id'     => new sfValidatorInteger(array('required' => false)),
            'quoctich'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'donvi_id'      => new sfValidatorInteger(array('required' => false)),
            'created_at'    => new sfValidatorDateTime(),
            'updated_at'    => new sfValidatorDateTime(),
        ));

        $this->widgetSchema->setNameFormat('csdl_lylichhoivien[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }
}
