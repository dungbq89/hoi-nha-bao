

<div class="box-hot">
    <div class="box-hot-news">
        <?php include_component('moduleArticle','newArticle',array('limit'=>10,'att'=>1)) ?>

        <div class="sct sidebar" id="right1">
            <div class="sct pictures" rel="38" id="ta38">
                <div class="hed">
                    <h1><a href="/image/tin-anh">Tin ảnh</a></h1>
                </div>
                <div class="slidebox" id="dslide">
                    <a href="javascript:djSlide.clickNext('dslide')" class="next" title="Next">Bài trước</a>
                    <a href="javascript:djSlide.clickPrev('dslide')" class="prev" title="Previous">Bài sau</a>
                    <div id="dslide_1" style="display: block; opacity: 1;">
                        <a href="/diem-den/nhung-trai-nghiem-thu-vi-khong-nen-bo-lo-khi-den-sa-pa/99720.htm"><img src="http://i.baohatinh.vn/news/1531/106v99720l1.jpeg"><b><span>Nh?ng tr?i nghi?m th� v? kh�ng n�n b? l? khi d?n Sa Pa</span></b></a>
                    </div>
                    <div id="dslide_2" style="display: none; opacity: -0.05;">
                        <a href="/diem-den/vong-quanh-the-gioi-ngam-canh-binh-minh-tuyet-dep/99708.htm"><img src="http://i.baohatinh.vn/news/1531/106v99708l1.jpeg"><b><span>V�ng quanh th? gi?i ng?m c?nh b�nh minh tuy?t d?p</span></b></a>
                    </div>
                    <div id="dslide_3" style="display: none; opacity: -0.05;">
                        <a href="/du-lich/angkor-wat-tuyet-dieu/99609.htm"><img src="http://i.baohatinh.vn/news/1531/105v99609l1.jpeg"><b><span>Angkor Wat tuy?t di?u</span></b></a>
                    </div>
                </div>
                <script type="text/javascript">djSlide.startshow('dslide', 1, 2000);</script>
            </div><div id="ad_right1_300" class="oad" style="display: block;"><a target="_blank" href="http://baohatinh.vn/adclick/701df7a1977d91d73cf374a7892f05aa/450?b=359&amp;r=793&amp;url=http://www.vietcombank.com.vn/" id="iad450"><img width="300px" height="240px" alt="" src="http://i.baohatinh.vn/ads/4/mdtim4499.jpg"></a></div>
            <div class="contact">
                <ul>
                    <li class="email">
                        <span>Email</span>
                        <a href="mailto:hatinhdientu@gmail.com" title="G?i email">hatinhdientu@gmail.com</a>
                        | <a onclick="dj('#quick-mail').show();return false" href="http://" title="Liên hệ">Liên hệ</a>
                    </li>
                    <li class="phone">
                        <span>Đường dây nóng</span>
                        <a title="Đường dây nóng" onclick="dj('#quick-phone').show();return false" href="#">Đường dây nóng: <b>0393.693.427</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="line"></div>
    <?php include_component('moduleArticle','focusNews',array('limit'=>5,'att'=>8)) ?>
    <div class="clear"></div>
    <div class="main">
        <div class="col-main">
            <div class="adv-body">
               <a target="_blank" href="http://baohatinh.vn/adclick/e45248519e1c6e60c66bfced8775f899/575?b=388&amp;r=792&amp;url=http://hoanhsongroup.vn/Web/vi-Vn/Trang-Chu" id="iad575"><img width="664px" height="90px" alt="" src="http://i.baohatinh.vn/ads/4/mdtim4528.jpg"></a>
            </div>
        <?php include_component('moduleArticle','categoryNews',array('limit'=>15)) ?>
        </div>
        <div class="col-right">
            <?php include_component('moduleVideo','listVideoHome',array('limit'=>5)) ?>
            <?php include_component('moduleDocument','hotDocument',array('limit'=>3)) ?>
            <?php include_component('moduleArticle','categoryHot',array('limit'=>3)) ?>
            <?php include_component('moduleMenu','linkRight') ?>
            <?php include_component('moduleAdvertise','advertise',array('location'=>'right')); ?>

        </div>
    </div>
    <div class="clear"></div>
</div>

<?php include_component('moduleAdvertise','advertise',array('location'=>'bottom')); ?>