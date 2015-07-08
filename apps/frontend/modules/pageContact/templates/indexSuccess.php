<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/13/15
 * Time: 11:18 PM
 */
?>

<div class="main">
    <div class="col-main">
        <div class="box">
            <?php if ($contact): ?>
                <h3 class="title-main"><span class="label">Liên hệ &raquo</span></h3>
                <div class="box-info">
                    <h3 class="title"><?php echo htmlspecialchars($contact->getTitle());?></h3>
                    <?php echo nl2br(htmlspecialchars($contact->getContent())); ?>
                </div>

                <div class="box-map">
                    <h3 class="title-item">Sơ đồ đường đi</h3>
                    <div class="map">
                        <!--Lay ca giai tri cho map-->
                        <input id="zoom" type="hidden" value="<?php echo (int)htmlspecialchars($contact->getZoom()) ?>">
                        <input id="lat" type="hidden" value="<?php echo floatval(htmlspecialchars($contact->getLat())) ?>">
                        <input id="lng" type="hidden" value="<?php echo floatval(htmlspecialchars($contact->getLng())) ?>">
                        <!-- The maps -->
                        <div id="map-canvas" style="float: left; height: 335px; width: 100%; position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="box-form-contact">
                <h3 class="title-item">Gửi thông tin liên hệ</h3>
                <form class="frm-contact" action="" method="POST">
                    <?php echo $form->renderHiddenFields() ?>
                    <div class="frm-item">
                        <span class="label">Tiêu đề (*)</span>
                        <span class="btn-in">
                             <?php echo $form['title']->render(array('class'=>'in-txt'));
                             if ($form['title']->hasError()) {
                                 echo '<span class="help-inline">' . $form['title']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>
                    <div class="frm-item">
                        <span class="label">Họ tên (*)</span>
                        <span class="btn-in">
                             <?php echo $form['full_name']->render(array('class'=>'in-txt'));
                             if ($form['full_name']->hasError()) {
                                 echo '<span class="help-inline">' . $form['full_name']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>
                    <div class="frm-item">
                        <span class="label">Số điện thoại (*)</span>
                        <span class="btn-in">
                             <?php echo $form['phone_number']->render(array('class'=>'in-txt'));
                             if ($form['phone_number']->hasError()) {
                                 echo '<span class="help-inline">' . $form['phone_number']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>
                    <div class="frm-item">
                        <span class="label">Email (*)</span>
                        <span class="btn-in">
                             <?php echo $form['email']->render(array('class'=>'in-txt'));
                             if ($form['email']->hasError()) {
                                 echo '<span class="help-inline">' . $form['email']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>
                    <div class="frm-item">
                        <span class="label">Nội dung (*)</span>
                        <span class="btn-in">
                             <?php echo $form['description']->render(array('class'=>'in-txt'));
                             if ($form['description']->hasError()) {
                                 echo '<span class="help-inline">' . $form['description']->renderError() . '</span>';
                             }?>
                        </span>
                    </div>
                    <div class="box-btn">
                        <button name="" type="submit" class="btn">Gửi</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="col-right">

        <?php include_component('moduleDocument','hotDocument',array('limit'=>3)) ?>
        <?php include_component('moduleArticle','categoryHot',array('limit'=>3)) ?>

        <?php include_component('moduleAdvertise','advertise',array('location'=>'right')); ?>
    </div>
    <div class="clear"></div>
</div>

<?php include_component('moduleAdvertise','advertise',array('location'=>'bottom')); ?>

