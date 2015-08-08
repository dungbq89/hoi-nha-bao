<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/13/15
 * Time: 11:17 PM
 */
class pageContactActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
		$this->contact = AdContactTable::getContact();
        $form=new contactForm();

        if($request->isMethod('POST')){
            $values = $request->getParameter($form->getName());
            $form->bind($values);
            if($form->isValid()){
                $comment= new AdComment();
                $comment->setTitle(trim($values['title']));
                $comment->setFullName(trim($values['full_name']));
                $comment->setPhoneNumber(trim($values['phone_number']));
                $comment->setEmail(trim($values['email']));
                $comment->setDescription(trim($values['description']));
                $comment->setCreateDate(date('Y-m-d H:i:s',time()));
                $comment->save();
				$this->getUser()->setFlash('success','Cảm ơn bạn đã gửi thông tin cho chúng tôi.');
            }
        }
        $this->form=$form;
    }
}