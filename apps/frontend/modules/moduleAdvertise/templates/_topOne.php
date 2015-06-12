<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 5:46 PM
 * To change this template use File | Settings | File Templates.
 */


if (count($advertise) > 0) {
    $type = $advertise[0]['view_type'];
    $advertiseImage = $advertise[0]['AdvertiseImage'];
    $count = count($advertiseImage);
}

?>
<?php if (isset($count) && $count > 0) : ?>
    <?php if ($type == 1): ?>
        <div class="slide">
            <ul class="bxslider">
                <?php for ($i = 0; $i < count($advertiseImage); $i++): ?>
                    <li><a href="<?php echo htmlspecialchars($advertiseImage[$i]['link']) ?>">
                            <img
                                src="<?php echo sfConfig::get('app_url_media_file') . '/' . sfConfig::get('app_advertise_images') . $advertiseImage[$i]['file_path']; ?>"></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>

    <?php endif; ?>
<?php endif; ?>