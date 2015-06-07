<?php
if (isset($articles) && $articles):
    $path = '/uploads/' . sfConfig::get('app_article_images') . $articles[0]['image_path'];
    ?>
    <div class="item item-hot-news">
        <a href="#" title="<?php echo htmlspecialchars($articles[0]['title']); ?>">
            <img class="img-news" src="<?php echo VtHelper::getThumbUrl($path, 460, 268, '') ?>" alt="">
            <h4 class="title"><?php echo htmlspecialchars($articles[0]['alttitle']); ?></h4>
        </a>

        <p><?php echo htmlspecialchars($articles[0]['header']); ?></p>

    </div>
    <div class="item item-lastest-news">
        <h3 class="title"><?php echo __('Tin nổi bật'); ?></h3>
        <?php if (count($articles) > 1): ?>
            <ul class="box-scroll mCustomScrollbar">
                <?php for($i=1;$i<count($articles);$i++): ?>
                <li>
                    <a href="" title="<?php echo htmlspecialchars($articles[$i]['title']); ?>"><?php echo htmlspecialchars($articles[$i]['alttitle']); ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        <?php endif; ?>
    </div>
<?php endif; ?>