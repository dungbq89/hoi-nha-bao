<?php if (isset($articles) && $articles): ?>
    <div id="multimedia" class="sct">
        <div class="hed"><h1>Tin tiêu điểm</h1></div>
        <?php foreach ($articles as $article):
            $path = '/uploads/' . sfConfig::get('app_article_images') . $article['image_path'];
            ?>
            <div class="atc dor">
                <div
                    style="background-image: url(<?php echo VtHelper::getThumbUrl($path, 187, 125, ''); ?>); background-size: cover;"
                    class="cover">
                    <a href="<?php echo url_for2('article_detail', array('slug' => $article['slug'])) ?>"></a>
                </div>
                <div class="hed"><h1>
                        <a href="<?php echo url_for2('article_detail', array('slug' => $article['slug'])) ?>"
                           title="<?php echo htmlspecialchars($article['title']); ?>">
                            <?php
                            echo VtHelper::truncate($article['alttitle'], 50, '...'); ?>
                        </a></h1></div>
            </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>