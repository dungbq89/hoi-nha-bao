<div class="box-notic">
    <div class="btn-hot">Hot</div>
    <div class="box-mequ">
        <p>TP Hồ Chí Minh thực hiện vay nóng 442 triệu USD để trống ngập úng</p>
    </div>
    <div class="date-time">Thứ 5, 20/05/2015</div>
</div>

<div class="box-hot">
    <div class="box-hot-news">
        <?php include_component('moduleArticle','newArticle',array('limit'=>10,'att'=>1)) ?>
        <?php include_component('moduleVideo','hotVideo',array('limit'=>5)) ?>

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