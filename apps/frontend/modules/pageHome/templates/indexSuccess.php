

<div class="box-hot">
    <div class="box-hot-news">
        <?php include_component('moduleArticle','newArticle',array('limit'=>10,'att'=>1)) ?>

        <div class="sct sidebar" id="right1">
            <div class="contact">
                <ul>
                    <li class="phone">
                        <span>Đăng ký hội viên</span>
                        <a href="http://hoinhabaohatinh.vn/dang-ky" title="Đăng ký hội viên">Đăng ký hội viên</a>
                    </li>
                    <li class="email">
                        <span>csdl hội viên</span>
                        <a title="CSDL Hội viên" href="http://hoinhabaohatinh.vn/danh-ba-hoi-vien">Cơ sở dữ liệu Hội viên</a>
                    </li>
                </ul>
            </div>
<!--            tin anh-->
            <?php include_component('moduleArticle','newsImages',array('limit'=>5,'att'=>2)) ?>
<!--            quang cao top-->
            <?php include_component('moduleAdvertise','rightTop',array('location'=>'right_top')) ?>


        </div>
    </div>
    <div class="clear"></div>
    <div class="line"></div>
    <?php include_component('moduleArticle','focusNews',array('limit'=>5,'att'=>8)) ?>
    <div class="clear"></div>
    <div class="main">
        <div class="col-main">
        <?php include_component('moduleAdvertise','left',array('location'=>'left')) ?>
        <?php include_component('moduleArticle','categoryNews',array('limit'=>15)) ?>
        </div>
        <div class="col-right">
            <?php include_component('moduleVideo','listVideoHome',array('limit'=>5)) ?>
            <?php include_component('moduleAdvertise','advertise',array('location'=>'right_middle')); ?>
            <?php include_component('moduleArticle','readNews',array('limit'=>5)) ?>
            <?php include_component('moduleDocument','hotDocument',array('limit'=>3)) ?>
            <?php include_component('moduleArticle','categoryHot',array('limit'=>3)) ?>
            <?php include_component('moduleMenu','linkRight') ?>
            <?php include_component('moduleAdvertise','advertise',array('location'=>'right')); ?>

        </div>
    </div>
    <div class="clear"></div>
</div>

<?php include_component('moduleAdvertise','advertise',array('location'=>'bottom')); ?>