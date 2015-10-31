<?php

/**
 * csdl_lylichhoivien filter form base class.
 *
 * @package    Web_Portals
 * @subpackage filter
 * @author     ngoctv1
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basecsdl_lylichhoivienFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'hoivien_id'    => new sfWidgetFormFilterInput(),
      'ten'           => new sfWidgetFormFilterInput(),
      'hodem'         => new sfWidgetFormFilterInput(),
      'ngaysinh'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'gioitinh'      => new sfWidgetFormFilterInput(),
      'diachi'        => new sfWidgetFormFilterInput(),
      'maquan'        => new sfWidgetFormFilterInput(),
      'matinh'        => new sfWidgetFormFilterInput(),
      'tieusu'        => new sfWidgetFormFilterInput(),
      'nghenghiep_id' => new sfWidgetFormFilterInput(),
      'dantoc_id'     => new sfWidgetFormFilterInput(),
      'quoctich'      => new sfWidgetFormFilterInput(),
      'donvi_id'      => new sfWidgetFormFilterInput(),
      'images'        => new sfWidgetFormFilterInput(),
      'dienthoai'     => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(),
      'hocvan'        => new sfWidgetFormFilterInput(),
      'ngoaingu'      => new sfWidgetFormFilterInput(),
      'chinhtri'      => new sfWidgetFormFilterInput(),
      'dangvien'      => new sfWidgetFormFilterInput(),
      'butdanh'       => new sfWidgetFormFilterInput(),
      'tacpham_id'    => new sfWidgetFormFilterInput(),
      'giaithuong_id' => new sfWidgetFormFilterInput(),
      'thehnbht'      => new sfWidgetFormFilterInput(),
      'cqcongtac'     => new sfWidgetFormFilterInput(),
      'chucvu'        => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'hoivien_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ten'           => new sfValidatorPass(array('required' => false)),
      'hodem'         => new sfValidatorPass(array('required' => false)),
      'ngaysinh'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'gioitinh'      => new sfValidatorPass(array('required' => false)),
      'diachi'        => new sfValidatorPass(array('required' => false)),
      'maquan'        => new sfValidatorPass(array('required' => false)),
      'matinh'        => new sfValidatorPass(array('required' => false)),
      'tieusu'        => new sfValidatorPass(array('required' => false)),
      'nghenghiep_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dantoc_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quoctich'      => new sfValidatorPass(array('required' => false)),
      'donvi_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'images'        => new sfValidatorPass(array('required' => false)),
      'dienthoai'     => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
      'hocvan'        => new sfValidatorPass(array('required' => false)),
      'ngoaingu'      => new sfValidatorPass(array('required' => false)),
      'chinhtri'      => new sfValidatorPass(array('required' => false)),
      'dangvien'      => new sfValidatorPass(array('required' => false)),
      'butdanh'       => new sfValidatorPass(array('required' => false)),
      'tacpham_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'giaithuong_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'thehnbht'      => new sfValidatorPass(array('required' => false)),
      'cqcongtac'     => new sfValidatorPass(array('required' => false)),
      'chucvu'        => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('csdl_lylichhoivien_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'csdl_lylichhoivien';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'hoivien_id'    => 'Number',
      'ten'           => 'Text',
      'hodem'         => 'Text',
      'ngaysinh'      => 'Date',
      'gioitinh'      => 'Text',
      'diachi'        => 'Text',
      'maquan'        => 'Text',
      'matinh'        => 'Text',
      'tieusu'        => 'Text',
      'nghenghiep_id' => 'Number',
      'dantoc_id'     => 'Number',
      'quoctich'      => 'Text',
      'donvi_id'      => 'Number',
      'images'        => 'Text',
      'dienthoai'     => 'Text',
      'email'         => 'Text',
      'hocvan'        => 'Text',
      'ngoaingu'      => 'Text',
      'chinhtri'      => 'Text',
      'dangvien'      => 'Text',
      'butdanh'       => 'Text',
      'tacpham_id'    => 'Number',
      'giaithuong_id' => 'Number',
      'thehnbht'      => 'Text',
      'cqcongtac'     => 'Text',
      'chucvu'        => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
