<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 8/23/15
 * Time: 11:26 PM
 */
?>
<div>
    <?php  $user = sfContext::getInstance()->getUser();
    $sFileName = '/hitcounter/'  . $user->getGuardUser()->getId(). '_bar_hitcounter.png';
    if (is_file(sfConfig::get('app_upload_media_file') . $sFileName)) {
        echo ' <img src="' . sfConfig::get('app_url_media_file') . '/hitcounter/' . $user->getGuardUser()->getId(). '_bar_hitcounter.png " />';
    }
    ?>
</div>
<div>
    <?php  $user = sfContext::getInstance()->getUser();
    $sFileName = '/hitcounter/'  . $user->getGuardUser()->getId(). '_pie_hitcounter.png';
    if (is_file(sfConfig::get('app_upload_media_file') . $sFileName)) {
        echo ' <img src="' . sfConfig::get('app_url_media_file') . '/hitcounter/' . $user->getGuardUser()->getId(). '_pie_hitcounter.png " />';
    }
    ?>
</div>