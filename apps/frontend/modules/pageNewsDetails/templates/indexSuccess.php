<div class="col-main">
    <div class="box">
        <h3 class="title-main"><span class="label">Tin tức »</span></h3>

        <div class="news-detail">
            <h3 class="title-article"><?php echo htmlspecialchars($article['title']); ?></h3>
                         <span class="txt-date">
                            <?php if ($article['published_time']) echo VtHelper::getFormatDate($listNews[0]['published_time']); ?>
                        </span>
                        <span class="txt-artice-intro">
                            <?php echo htmlspecialchars($article['header']); ?>
                        </span>
            <?php echo $article['body']; ?>

            <div class="box-article-more">
                <h3 class="h3-more">Bài viết cùng chuyên mục</h3>
                <a href="#" title="">Mua thẻ Vcoin - nhắn tin là có, Mua thẻ Vcoin - nhắn tin là có, Mua thẻ Vcoin -
                    nhắn tin là có, Mua thẻ Vcoin - nhắn tin là có (03/10/2014)</a> </h3>
                <a href="#" title="">Mua thẻ Vcoin - nhắn tin là có (03/10/2014)</a>
                <a href="#" title="">Mua thẻ Vcoin - nhắn tin là có (03/10/2014)</a>
                <a href="#" title="">Mua thẻ Vcoin - nhắn tin là có (03/10/2014)</a>
                <a href="#" title="">Mua thẻ Vcoin - nhắn tin là có (03/10/2014)</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="col-right">
    <?php include_component('moduleDocument', 'hotDocument', array('limit' => 3)) ?>
    <?php include_component('moduleArticle', 'categoryHot', array('limit' => 3)) ?>
    <div class="box-adv box-mod">
        <img class="" src="img/img-adv.png" alt="">
    </div>

</div>