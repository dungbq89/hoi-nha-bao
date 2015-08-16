<div class="sct pictures" rel="38" id="ta38">
    <div class="hed">
        <h1><a href="#">Tin ảnh</a></h1>
    </div>
    <?php
    if (isset($articles) && count($articles) > 1): ?>
    <div class="slidebox" id="dslide">
        <a href="javascript:djSlide.clickNext('dslide')" class="next" title="Next">Bài trước</a>
        <a href="javascript:djSlide.clickPrev('dslide')" class="prev" title="Previous">Bài sau</a>
        <?php for($i=0;$i<count($articles);$i++):
            $path = '/uploads/' . sfConfig::get('app_article_images') . $articles[$i]['image_path'];
            ?>
            <div id="dslide_<?php echo $i+1 ?>" style="display: <?php echo ($i==0)? 'block':'none' ?>; opacity: <?php echo ($i==0)? '1':'-0.05' ?>;">
                <a href="<?php echo url_for2('article_detail',array('slug'=>$articles[$i]['slug'])) ?>">
                    <img src="<?php echo VtHelper::getThumbUrl($path, 300, 200, '') ?>">
                    <b><span><?php echo htmlspecialchars($articles[$i]['title']); ?></span></b>
                </a>
            </div>
        <?php endfor; ?>
    </div>
    <script type="text/javascript">djSlide.startshow('dslide', 1, 2000);</script>
    <?php endif; ?>
</div>