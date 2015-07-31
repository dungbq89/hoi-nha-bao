<div class="col-main">
    <div class="box">
        <h3 class="title-main"><span class="label">Tin tức »</span></h3>

        <div class="news-detail">
            <h3 class="title-article"><?php echo htmlspecialchars($article['title']); ?></h3>
                         <span class="txt-date">
                            <?php if ($article['published_time']) echo VtHelper::getFormatDate($article['published_time']); ?>
                        </span>

                        <span class="txt-artice-intro">
                            <?php echo htmlspecialchars($article['header']); ?>
                        </span>
            <?php echo $article['body']; ?>
            <?php
                if(isset($articleRelated) && count($articleRelated)):
            ?>
            <div class="box-article-more">
                <h3 class="h3-more">Bài viết cùng chuyên mục</h3>
                <?php
                    foreach($articleRelated as $value):
                ?>
                <a href="<?php echo url_for2('article_detail',array('slug'=>$value['slug'])) ?>" title="<?php echo htmlspecialchars($value['title']); ?>">
                    <?php echo htmlspecialchars($value['title']); ?>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="col-right">
    <?php include_component('moduleDocument', 'hotDocument', array('limit' => 3)) ?>
    <?php include_component('moduleArticle', 'categoryHot', array('limit' => 3)) ?>
    <?php include_component('moduleAdvertise','advertise',array('location'=>'right')); ?>

</div>