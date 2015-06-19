<?php if (isset($categories) && $categories): ?>
    <?php foreach ($categories as $category): ?>
        <?php
        $listNews = $category->getNewsByCategory();
        if (count($listNews)):
            $path = '/uploads/' . sfConfig::get('app_article_images') . $listNews[0]['image_path'];
            ?>
            <div class="box-news">
                <h3 class="title-main"><span class="label"><?php echo htmlspecialchars($category->getName()); ?>
                        &raquo</span></h3>

                <div class="item news-item">
                    <a href="<?php echo url_for2('article_detail',array('slug'=>$listNews[0]['slug'])) ?>" title="" class="news-img"><img src="<?php echo VtHelper::getThumbUrl($path, 197, 118, '') ?>" alt=""></a>

                    <div class="news-info">
                        <a href="<?php echo url_for2('article_detail',array('slug'=>$listNews[0]['slug'])) ?>" title="" class="news-title"><?php echo htmlspecialchars($listNews[0]['alttitle']); ?></a>

                        <p class="news-txt"><?php echo VtHelper::truncate($listNews[0]['header'],80,'...'); ?></p>

                        <p class="news-date">
                            <?php
                            if($listNews[0]['published_time']) echo VtHelper::getFormatDate($listNews[0]['published_time']);
                            ?>
                        </p>
                        <a href="" class="readmore" title="Xem tiếp">Xem tiếp</a>
                    </div>
                </div>
                <?php if(count($listNews)>1): ?>
                <div class="item news-more">
                    <ul>
                        <?php for($i=1;$i<count($listNews);$i++): ?>
                        <li><a href="<?php echo url_for2('article_detail',array('slug'=>$listNews[$i]['slug'])) ?>" title="<?php echo htmlspecialchars($listNews[$i]['title']); ?>"><?php echo VtHelper::truncate($listNews[$i]['alttitle'],40,'...'); ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            <?php endif; ?>
                <div class="clear"></div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
