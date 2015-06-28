<div class="slide">

    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
        <?php
        if (isset($listImage) && $listImage) {
            foreach ($listImage as $image) {
                $path = '/uploads/' . sfConfig::get('app_album_images') . $image['file_path'];
                ?>
                <li data-thumb="<?php echo VtHelper::getThumbUrl($path, 180, 108) ?>">
                    <img class="img-gallery" src="<?php echo VtHelper::getThumbUrl($path, 180, 108) ?>"/>

                    <div class="txt-gallery">
                        <h3><a href="" title="">Viettel công bố chính sách ưu đãi riêng cho khách hàng</a></h3>
                        <span class="txt-gallery-date">
                            Thứ năm, 29/09/2013 09:40PM
                        </span>
                        <span class="txt-gallery-news">
                            Với nhiệm vụ nghiên cứu, xây dựng và triển khai các hệ thống công nghệ thông tin phục vụ Tập đoàn   Với nhiệm vụ nghiên cứu, xây dựng và triển khai các hệ thống công nghệ thông tin phục vụ Tập đoàn   Với nhiệm vụ nghiên cứu..
                        </span>
                    </div>
                </li>
            <?php
            }
        }
        ?>


    </ul>


</div>

