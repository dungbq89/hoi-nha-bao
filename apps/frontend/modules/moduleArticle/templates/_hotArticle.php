<?php
if (isset($articles) && $articles):
    ?>
    <div class="box-notic">
        <div class="btn-hot">TIN MỚI NHẬN</div>
        <div class="box-mequ">
            <marquee direction="left" width="480px" style="width: 480px;">
                <?php
                foreach($articles as $value):
                    ?>
                    <a href="<?php echo url_for2('article_detail',array('slug'=>$value['slug'])) ?>" title="<?php echo htmlspecialchars($value['title']); ?>">
                        <?php echo htmlspecialchars($value['title']); ?>
                    </a>
                <?php endforeach; ?>
            </marquee>

        </div>
        <div class="date-time"><?php echo VtHelper::getFormatDate(date('Y-m-d h:i:s')) . ' | GMT+7'; ?> </div>

        <div class="bxpanel">
            <ul class="top-button">
                <li><a href="http://dhtn.hatinh.gov.vn" target="_blank"><img src="/images/mquochuy.gif"></a></li>
                <li><a href="#" target="_blank"><img src="/images/mfb.png"></a></li>
                <li><a href="#" target="_blank"><img src="/images/mgplus.png"></a></li>
                <li><a href="#" target="_blank"><img src="/images/mtwitter.png"></a></li>
                <li><a href="#" target="_blank"><img src="/images/mzing.gif"></a></li>
                <li><a href="#" target="_blank"><img src="/images/zalo.jpg"></a></li>
            </ul>
        </div>
    </div>
<?php endif; ?>