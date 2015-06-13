<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//require_once sfConfig::get('sf_lib_dir') . '/utils/PHPMailer/class.phpmailer.php';
class ajaxActions extends sfActions {

    public function executeAjaxLoadVideo(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $emb_video = '';
        if ($id) {
            $video = AdVideoTable::getVideoById($id)->fetchOne();
            if ($video) {
                $path = '/uploads/' . sfConfig::get('app_advertise_images') . $video->getImagePath();
                $url_file = sfConfig::get('app_url_media_file') . '/video/' . $video->getFilePath();
                $emb_video = VtHelper::generateEmbedJwplayer($url_file,300,220,$path);
            }
        }
        return $this->renderText(json_encode($emb_video));
    }

}
