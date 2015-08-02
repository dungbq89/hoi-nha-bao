<div class="col-main">
    <div class="box">
        <h3 class="title-main"><span class="label">Về chúng tôi »</span></h3>

        <div class="news-detail">
            <h3 class="title-article"><?php echo htmlspecialchars($html['name']); ?></h3>
            <?php echo $html['content']; ?>

            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="col-right">
    <?php include_component('pageIntroduction', 'categoryIntro') ?>
    <?php include_component('moduleDocument', 'hotDocument', array('limit' => 3)) ?>
    <?php include_component('moduleArticle', 'categoryHot', array('limit' => 3)) ?>
    <?php include_component('moduleMenu','linkRight') ?>
    <?php include_component('moduleAdvertise', 'advertise', array('location' => 'right')); ?>

</div>