<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/11/15
 * Time: 11:29 PM
 */
?>
<div class="main" xmlns="http://www.w3.org/1999/html">
    <div class="col-main">
        <div class="box">
            <h3 class="title-main"><span class="label">Tra cứu hội viên &raquo</span></h3>
            <div class="box-form">
                <form class="frm-log" action="" method="POST">
                    <?php echo $form->renderHiddenFields() ?>

                    <div class="frm-item">
                        <span class="label">Tên hội viên</span>
                        <span class="btn-in">
                             <?php echo $form['full_name']->render(array('class'=>'in-txt'));
                             if ($form['full_name']->hasError()) {
                                 echo '<span class="help-inline">' . $form['full_name']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>
                    <div class="frm-item">
                        <span class="label">Điện thoại</span>
                        <span class="btn-in">
                             <?php echo $form['phone_number']->render(array('class'=>'in-txt'));
                             if ($form['phone_number']->hasError()) {
                                 echo '<span class="help-inline">' . $form['phone_number']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>

                    <div class="frm-item">
                        <span class="label">Email</span>
                        <span class="btn-in">
                             <?php echo $form['email']->render(array('class'=>'in-txt'));
                             if ($form['email']->hasError()) {
                                 echo '<span class="help-inline">' . $form['email']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>
                    <div class="box-btn">

                        <button name="" type="submit" class="btn">Tra cứu</button>
<!--                        <button name="" type="reset" class="btn">Hủy bỏ</button>-->
                    </div>

                </form>
            </div>
            <h3 class="slice-list">Danh sách hội viên Hội nhà báo Hà Tĩnh</h3>

            <?php
            if (isset($listPersonal) && count($listPersonal)):
                foreach ($listPersonal as $personal):
                    $path = '/uploads/member'. $personal->images;
                    ?>
                    <div class="list-news">
                        <a href="<?php echo url_for2('personnal_detail',array('id'=>$personal->id)) ?>" title="" class="news-img" style="width: 90px;"><img style="width: 90px; height: 120px;" src="<?php echo VtHelper::getThumbUrl($path, 90, 120, 'user_90_120') ?>" alt=""></a>

                        <div class="info-hoivien">
                            <a href="<?php echo url_for2('personnal_detail',array('id'=>$personal->id)) ?>" title="" class="news-title"  style="margin-bottom: 5px; color: #3398cc;">
                                <?php echo $personal->hodem; ?>
                            </a>

                            <p class="news-txt-hoivien">
                                <span><b>Số thẻ hội viên: </b><?php echo $personal->thehnbht; ?></span>&nbsp;&nbsp;&nbsp;
                                <?php
                                $donvi = csdl_coquanbaochiTable::tenDonvi($personal->donvi_id);
                                echo $donvi;
                                ?>
                            </p>
                            <p class="news-txt-hoivien">
                                <span><b>Địa chỉ: </b><?php echo $personal->diachi; ?></span>
                            </p>
                            <p class="news-txt-hoivien">
                                <span><b>Ngày sinh: </b><?php if($personal->ngaysinh) echo date('d/m/Y',strtotime($personal->ngaysinh)); ?></span>&nbsp;&nbsp;&nbsp;
                            </p>
                            <p class="news-txt-hoivien">
                                <span><b>Số điện thoại: </b><?php echo $personal->phone; ?></span>&nbsp;&nbsp;&nbsp;
                                <span><b>Email: </b><?php echo $personal->email; ?>
                            </p>

                        </div>
                        <div class="clear"></div>
                    </div>
                <?php
                endforeach;
            endif;
            ?>

            <?php
            if ($pager->haveToPaginate()){
                include_component("common", "pagging", array('redirectUrl'=>$url_paging,'pager'=>$pager,'vtParams'=>array('slug'=>sfContext::getInstance()->getRequest()->getParameter('slug'))));
            }
            ?>

        </div>
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
    <div class="clear"></div>
</div>
<?php include_component('moduleAdvertise','advertise',array('location'=>'bottom')); ?>