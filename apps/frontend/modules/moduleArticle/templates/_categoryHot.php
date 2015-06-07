<?php if (isset($categories) && $categories): ?>
    <?php foreach ($categories as $category): ?>
        <?php
        $listNews = $category->getNewsByCategory();
        if (count($listNews)):
            ?>
            <div class="box-mod">
                <h3 class="title"><span class="label"><?php echo htmlspecialchars($category->getName()); ?>
                        &raquo</span></h3>
                <?php
                foreach ($listNews as $news):
                    $path = '/uploads/' . sfConfig::get('app_article_images') . $news['image_path'];
                    ?>
                    <div class="item news-item">
                        <a href="#" title="" class="news-img"><img src="<?php echo VtHelper::getThumbUrl($path, 92, 55, '') ?>" alt=""></a>
                        <a href="" title="<?php echo htmlspecialchars($news['title']); ?>" class="news-title"><?php echo htmlspecialchars($news['alttitle']); ?></a>

                        <p class="news-date">
                            <?php
                            if($news['published_time']) echo VtHelper::getFormatDate($news['published_time']);
                            ?>
                        </p>

                        <div class="clear"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
