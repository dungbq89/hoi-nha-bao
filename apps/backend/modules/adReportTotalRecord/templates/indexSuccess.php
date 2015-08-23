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
    $sFileName = '/total_record/'  . $user->getGuardUser()->getId(). '_total_record.png';
    if (is_file(sfConfig::get('app_upload_media_file') . $sFileName)) {
        echo ' <img src="' . sfConfig::get('app_url_media_file') . '/total_record/' . $user->getGuardUser()->getId(). '_total_record.png " />';
    }
    ?>
</div>