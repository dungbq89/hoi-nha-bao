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
            $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
            if($form->isValid()){
                $values = $form->getValues();

               // $form->save();
                $reg = new csdl_lylichhoivien();

                $name = trim($values['hodem']);
                $parts = explode(" ", $name);
                $lastname = array_pop($parts);
                //$firstname = implode(" ", $parts);

                $reg->setHodem($name);
                $reg->setTen($lastname);

                //$year = date('Y-m-d', strtotime($values['ngaysinh']['day'].'-'.$values['ngaysinh']['month'].'-'.$values['ngaysinh']['year']));
                $reg->setNgaysinh($values['ngaysinh']);
                $reg->setGioitinh($values['gioitinh']);
                $reg->setTieusu($values['tieusu']);
                $reg->setNghenghiepId($values['nghenghiep_id']);
                $reg->setDonviId($values['donvi_id']);
                $reg->setDantocId($values['dantoc_id']);
                $reg->setQuoctich($values['quoctich']);
                $reg->setMatinh($values['matinh']);
                $reg->setMaquan($values['maquan']);
                $reg->setDiachi($values['diachi']);
                $reg->setDienthoai($values['dienthoai']);
                $reg->setEmail($values['email']);
                $reg->setDangvien($values['dangvien']);
                $reg->setHocvan($values['hocvan']);
                $reg->setChinhtri($values['chinhtri']);
                $reg->setNgoaingu($values['ngoaingu']);
                $reg->setButdanh($values['butdanh']);
                $reg->setThehnbht($values['thehnbht']);
                $reg->setCqcongtac($values['cqcongtac']);
                $reg->setChucvu($values['chucvu']);
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