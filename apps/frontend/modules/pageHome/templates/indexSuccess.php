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
        <?php include_component('moduleArticle','categoryNews',array('limit'=>6)) ?>



        </div>
        <div class="col-right">
            <?php include_component('moduleDocument','hotDocument',array('limit'=>3)) ?>
            <?php include_component('moduleArticle','categoryHot',array('limit'=>3)) ?>




            <div class="box-adv box-mod">
                <img class="" src="img/img-adv.png" alt="">
            </div>

        </div>
    </div>
    <div class="clear"></div>
</div>

<div class="box-adv-main">
    <img class="img-responsive" src="img/img-qc.png" alt="">
</div>