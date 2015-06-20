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
            <h3 class="title-main"><span class="label">Liên hệ &raquo</span></h3>
            <div class="box-info">
                <table class="table-border">
                    <tr>
                        <td class="txt-label">Tên hội</td>
                        <td>Hội nhà báo VNTY Hà Nội</td>
                    </tr>
                    <tr>
                        <td class="txt-label">Địa chỉ</td>
                        <td>58 Lý Thường Kiệt - Hàng Bài, Hà Nội</td>
                    </tr>
                    <tr>
                        <td class="txt-label">Số điện thoại</td>
                        <td>043-456-7865. Hotline: 0988876543</td>
                    </tr>
                    <tr>
                        <td class="txt-label">Fax</td>
                        <td>0975356878</td>
                    </tr>
                </table>
            </div>

            <div class="box-map">
                <h3 class="title-item">Sơ đồ đường đi</h3>
                <img src="/img/img-map.png" class=""/>
            </div>

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

