<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="all-ie-only.css"/>
    <![endif]-->
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <?php include_stylesheets() ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php include_javascripts() ?>
</head>
<body>
<div class="container wrapper">
    <div class="header">
        <a href="<?php echo url_for('@homepage'); ?>" class="logo">
            <img src="../../img/img-logo.png" class=""/>
        </a>
        <?php include_component('moduleAdvertise','advertise',array('location'=>'header')); ?>
        <div class="box-form-search">
            <div class="box-btn">
                <a href="/index.php"><button class="btn">Diễn đàn</button></a>
                <a href="/danh-ba-hoi-vien"><button class="btn"> Danh bạ </button></a>
                <a href="/lien-he"><button class="btn">Liên hệ</button></a>
            </div>
            <form class="frm-search" method="get" action="<?php echo url_for1('@page_search') ?>">
                <input type="text" class="in-search" name="query" placeholder="Nhập từ khóa tìm kiếm" value="">
                <input type="submit" value="">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="nav">
        <?php include_component('moduleMenu','mainMenu'); ?>
    </div>

    <?php include_component('moduleAdvertise','topOne'); ?>

    <?php echo $sf_content ?>
    <?php include_component('moduleMenu','linkFooter') ?>
    <div class="footer">
        <div class="copyright">
            <div class="ilog">
                <a href="http://baohatinh.vn"><b>&copy; Copyright 2009 hoinhabaohatinh.vn</b></a>
                <p class="hide-on-small">Văn phòng Hội: Số 34 đường Nguyễn Công Trứ, thành phố Hà Tĩnh, tỉnh Hà Tĩnh
                </p>
                <p class="hide-on-small"> Email: info@hoinhabaohatinh.vn</p>
                <p class="hide-on-small"> Website: http:/www.hoinhabaohatinh.vn</p>
            </div>
<!--            <div class="info vcard hide-on-small">-->
<!--                Liên hệ quảng cáo<br>-->
<!--                Thông tin Tòa soạn: <a style="font-weight:bold" href="mailto: info@hoinhabaohatinh.vn">info@hoinhabaohatinh.vn</a><br>-->
<!--            </div>-->
            <div style="clear:both"></div>
        </div>


<!--        <div class="bg-word"></div>-->
<!--        <p class="copyright">-->
<!--            HỘI NHÀ BÁO HÀ TĨNH <br /><br />-->
<!--            Văn phòng Hội: Số 34 đường Nguyễn Công Trứ, thành phố Hà Tĩnh, tỉnh Hà Tĩnh <br /><br />-->
<!--            Email: info@hoinhabaohatinh.vn     Website: http:/www.hoinhabaohatinh.vn</p>-->
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

</body>
</html>
