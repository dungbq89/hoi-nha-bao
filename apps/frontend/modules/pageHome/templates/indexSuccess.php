<?php include_component('moduleArticle','hotArticle',array('limit'=>10,'att'=>1)) ?>

<div class="box-hot">
    <div class="box-hot-news">
        <?php include_component('moduleArticle','newArticle',array('limit'=>10,'att'=>1)) ?>
        <?php include_component('moduleVideo','listVideoHome',array('limit'=>5)) ?>

    </div>
    <div class="clear"></div>
    <div class="line"></div>
    <div class="main">
        <div class="col-main">
        <?php include_component('moduleArticle','categoryNews',array('limit'=>15)) ?>



        </div>
        <div class="col-right">
            <?php include_component('moduleDocument','hotDocument',array('limit'=>3)) ?>
            <?php include_component('moduleArticle','categoryHot',array('limit'=>3)) ?>
            <?php include_component('moduleAdvertise','advertise',array('location'=>'right')); ?>

        </div>
    </div>
    <div class="clear"></div>
</div>

<?php include_component('moduleAdvertise','advertise',array('location'=>'bottom')); ?>