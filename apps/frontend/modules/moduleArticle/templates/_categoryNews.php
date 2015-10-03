<?php if (isset($categories) && $categories): ?>
    <?php foreach ($categories as $category): ?>
        <?php
        $listNews = $category->getNewsByCategory();
        $count=count($listNews);
        if ($count):
            $path = '/uploads/' . sfConfig::get('app_article_images') . $listNews[0]['image_path'];
            ?>
            <div class="box-news">
                <h3 class="title-main">
                    <span class="label"><a style="color: #fff;"
                                           href="<?php echo url_for2('category_news', array('slug' => $category->getSlug())) ?>"><?php echo htmlspecialchars($category->getName()); ?></a>
                            &raquo</span>
                    <?php
                    $listChild = $category->getChildCategory();
                    if($listChild){
                        echo "<span class='span-news'>";
                        echo "<ul class='ul-child'>";
                        foreach($listChild as $child){
                            $link=url_for2('category_news', array('slug' => $child['slug']));
                            if($child['link']!=''){
                                if (VtHelper::startsWith($child['link'], '@')) {
                                    $link = url_for($child['link']);
                                } else {
                                    $link=$child['link'];
                                }
                            }
                            ?>
                            <li><a class="child-cat" href="<?php echo $link; ?>">
                                    <?php echo $child['name']; ?>
                                </a>
                            </li>
                            <?php
                        }
                        echo "</ul>";
                        echo "</span>";
                    }
                    ?>
                </h3>

                <div class="item news-item">
                    <a href="<?php echo url_for2('article_detail', array('slug' => $listNews[0]['slug'])) ?>" title=""
                       class="news-img"><img src="<?php echo VtHelper::getThumbUrl($path, 197, 118, 'image_hot') ?>" alt=""></a>

                    <div class="news-info">
                        <a href="<?php echo url_for2('article_detail', array('slug' => $listNews[0]['slug'])) ?>"
                           title="" class="news-title"><?php echo VtHelper::truncate($listNews[0]['title'],60, ' ...'); ?></a>

                        <p class="news-txt"><?php echo VtHelper::truncate($listNews[0]['header'], 80, '...'); ?></p>

                        <p class="news-date">
                            <?php
                            if ($listNews[0]['published_time']) echo VtHelper::getFormatDate($listNews[0]['published_time']);
                            ?>
                        </p>
                        <a href="<?php echo url_for2('article_detail', array('slug' => $listNews[0]['slug'])) ?>"
                           class="readmore" title="Xem tiếp">Xem tiếp</a>
                    </div>
                    <?php if ($count > 1):
                        $path = '/uploads/' . sfConfig::get('app_article_images') . $listNews[1]['image_path'];
                        ?>
                    <div class="clear"></div>
                    <br />
                    <a href="<?php echo url_for2('article_detail', array('slug' => $listNews[1]['slug'])) ?>" title=""
                       class="news-img"><img src="<?php echo VtHelper::getThumbUrl($path, 197, 118, 'image_hot') ?>" alt=""></a>

                    <div class="news-info">
                        <a href="<?php echo url_for2('article_detail', array('slug' => $listNews[1]['slug'])) ?>"
                           title="" class="news-title"><?php echo VtHelper::truncate($listNews[1]['title'],60, ' ...'); ?></a>

                        <p class="news-txt"><?php echo VtHelper::truncate($listNews[1]['header'], 80, '...'); ?></p>

                        <p class="news-date">
                            <?php
                            if ($listNews[1]['published_time']) echo VtHelper::getFormatDate($listNews[1]['published_time']);
                            ?>
                        </p>
                        <a href="<?php echo url_for2('article_detail', array('slug' => $listNews[1]['slug'])) ?>"
                           class="readmore" title="Xem tiếp">Xem tiếp</a>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ($count > 2): ?>
                    <div class="item news-more">
                        <ul>
                            <?php for ($i = 2; $i < count($listNews); $i++): ?>
                                <li>
                                    <a href="<?php echo url_for2('article_detail', array('slug' => $listNews[$i]['slug'])) ?>"
                                       title="<?php echo htmlspecialchars($listNews[$i]['title']); ?>"><?php echo VtHelper::truncate($listNews[$i]['title'], 50, '...'); ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="clear"></div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
