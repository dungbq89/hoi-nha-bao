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

                $this->getUser()->setFlash('success','Bạn đã đăng ký thành công, chúng tôi sẽ xét duyệt hồ sơ của bạn.');
            }
        }
        $this->form=$form;
    }
}