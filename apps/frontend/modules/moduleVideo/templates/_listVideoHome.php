<?php if (isset($listVideo) && count($listVideo) > 0): ?>

    <div class="item item-video">

        <div id="box-video-play" class="video-play">
            <?php
            $url_file = sfConfig::get('app_url_media_file') . '/video/';
            $path = '/uploads/' . sfConfig::get('app_advertise_images') . $listVideo[0]->getImagePath();
            echo '<div style="margin-bottom: 20px;">';
            echo VtHelper::generateEmbedJwplayer($url_file . $listVideo[0]->getFilePath(), 300, 220, $path);
            echo '</div>';
            ?>
        </div>

        <div class="more-video">
            <?php
            foreach ($listVideo as $key => $video):
                ?>
                <h3>
                    <a id="tit-video<?php echo $video->getId(); ?>" <?php if ($key == 0) echo 'class="title-video-active"'; ?>
                       href="javascript:void(0)"
                       onclick="ajaxLoadVideo('<?php echo url_for1('ajax_load_video'); ?>',<?php echo $video->getId(); ?>)"
                       title="<?php echo htmlspecialchars($video->getName()); ?>"><?php echo VtHelper::truncate($video->getName(), 35, '...') ?></a>
                </h3>
            <?php
            endforeach;
            ?>
        </div>
    </div>

<?php endif; ?>
<!--<script type="text/javascript" src="/js/jwplayer/jwplayer.js"></script>-->
<script type="text/javascript">
    function ajaxLoadVideo(url, id){
        $.ajax({
            type: "GET",
            url: url,
            cache: true,
            data: {
                id: id
            },
            success: function(data) {
                $('a').removeClass('title-video-active');
                obj = $.parseJSON(data);
                $('#box-video-play').html(obj);
                $('#tit-video'+id).addClass('title-video-active');
            },
            error: function() {
            }
        });
    }
</script>
