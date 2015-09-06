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

        $i18n = sfContext::getInstance()->getI18N();
        unset($this['created_at'], $this['updated_at']);
        $this->widgetSchema['ten'] = new sfWidgetFormInputText(array());
        $this->validatorSchema['ten'] = new sfValidatorString(array('required' => true, 'trim' => true, 'max_length' => 255));

        $this->widgetSchema['ngaysinh'] = new sfWidgetFormVnDatePicker(array(),array('readonly'=>true));
        $this->validatorSchema['ngaysinh'] = new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d H:i:s'));


        $this->widgetSchema['gioitinh'] = new sfWidgetFormChoice(array(
            'choices' => $this->getSex(),
            'multiple' => false,
            'expanded' => false));
        $this->validatorSchema['gioitinh'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($this->getSex()),));

        $this->widgetSchema['nghenghiep_id'] = new sfWidgetFormChoice(array(
        'choices' => $this->getJob(),
        'multiple' => false,
        'expanded' => false));
        $this->validatorSchema['nghenghiep_id'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($this->getJob()),));

        $this->widgetSchema['donvi_id'] = new sfWidgetFormChoice(array(
            'choices' => $this->getDonVi(),
            'multiple' => false,
            'expanded' => false));
        $this->validatorSchema['donvi_id'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($this->getDonVi()),));

        $this->widgetSchema['matinh'] = new sfWidgetFormChoice(array(
            'choices' => $this->getCity(),
            'multiple' => false,
            'expanded' => false));
        $this->validatorSchema['matinh'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($this->getCity()),));

        $this->widgetSchema['maquan'] = new sfWidgetFormChoice(array(
            'choices' => $this->getProvince(),
            'multiple' => false,
            'expanded' => false));
        $this->validatorSchema['maquan'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($this->getProvince()),));

        $this->widgetSchema->setNameFormat('csdl_lylichhoivien[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

    protected function getSex()
    {
        return array(
            '0' => 'Nữ',
            '1' => 'Nam'
        );
    }

    protected function getJob(){
        $arrJobs = array(''=>'----- Chọn nghề nghiệp -----');
        $jobs = csdl_dmnghenghiepTable::getJob()->fetchArray();
        if(count($jobs)>0){
            foreach($jobs as $value){
                $arrJobs[$value['id']] = $value['tendanhmuc'];
            }
        }
        return $arrJobs;
    }

    protected function getDonVi(){
        $arrJobs = array(''=>'----- Chọn đơn vị -----');
        $jobs = csdl_coquanbaochiTable::getJob()->fetchArray();
        if(count($jobs)>0){
            foreach($jobs as $value){
                $arrJobs[$value['id']] = $value['tendonvi'];
            }
        }
        return $arrJobs;
    }

    protected function getCity(){
        $arrJobs = array(''=>'----- Chọn tỉnh/thành phố -----');
        $jobs = csdl_areaTable::getCity()->fetchArray();
        if(count($jobs)>0){
            foreach($jobs as $value){
                $arrJobs[$value['PROVINCE']] = $value['NAME'];
            }
        }
        return $arrJobs;
    }

    protected function getProvince(){
        $arrJobs = array(''=>'----- Chọn quận/huyện -----');
        return $arrJobs;
    }
}
