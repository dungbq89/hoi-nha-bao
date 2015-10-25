<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/11/15
 * Time: 11:29 PM
 */
?>
<div class="main">
    <div class="col-main">
        <div class="box">
            <h3 class="title-main"><span class="label">Chi tiết hội viên &raquo</span></h3>

            <?php if(isset($personal)):
                ?>
                <table class="table bordered">
                    <tr>
                        <td>Họ và tên</td>
                        <td><?php echo $personal->hodem.' '.$personal->ten; ?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><?php echo $personal->diachi; ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><?php echo $personal->phone; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $personal->email_address; ?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><?php echo $personal->diachi; ?></td>
                    </tr>
                </table>
            <?php endif; ?>
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