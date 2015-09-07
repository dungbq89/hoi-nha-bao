<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 7/28/15
 * Time: 11:33 PM
 */

class pageRegisterActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {

        $form=new registerForm();

        if($request->isMethod('POST')){
            $values = $request->getParameter($form->getName());
            $form->bind($values);
            if($form->isValid()){
                $reg = new csdl_lylichhoivien();
                $reg->setHodem($values['hodem']);
                $year = date('Y-m-d h:i:s', strtotime($values['ngaysinh']['date']));
                $reg->setNgaysinh($year);
                $reg->setGioitinh($values['gioitinh']);
                $reg->setMatinh($values['matinh']);
                $reg->setMaquan($values['maquan']);
                $reg->setDiachi($values['diachi']);
                $reg->setDonviId($values['donvi_id']);
                $reg->setNghenghiepId($values['nghenghiep_id']);
                $reg->setHodem($values['hodem']);
                $reg->save();
                $this->getUser()->setFlash('success','Bạn đã đăng ký thành công, chúng tôi sẽ xét duyệt hồ sơ của bạn.');
                $this->form = new registerForm();
            }
        }
        $this->form=$form;
    }

    public function executeLoadProvince(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $strProvince = "<option selected='selected' value=''>----- Chọn quận/huyện -----</option>";
        if($id){
            $provinces = csdl_areaTable::getProvinceByCityCode($id)->fetchArray();
            if(count($provinces)>0){
                foreach($provinces as $value){
                    $strProvince .= "<option value=".$value['DISTRICT'].">".$value['NAME']."</option>";
                }
            }
        }
        return $this->renderText(json_encode($strProvince));
    }
}