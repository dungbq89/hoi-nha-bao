<?php
/**
 * Created by PhpStorm.
 * User: Ta Van Ngoc
 * Date: 6/13/15
 * Time: 11:18 PM
 */
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php
//tọa độ mặc định
    if ($contact){
        $lat=$contact->getLat();
        $lng=$contact->getLng();
        $zoom=$contact->getZoom();
    }else{
        $lat=16.120784;
        $lng=106.158487;
        $zoom=6;
    }

    $maptype='google.maps.MapTypeId.ROADMAP';
    $i=0;
    $strMarker="var infowindow = new google.maps.InfoWindow();";


    $strScript = "<script>
            var map;
            var markers = [];
            function initialize() {
                var myLatlng = new google.maps.LatLng(" . $lat . "," . $lng . ");
                var mapOptions = {
                  zoom: " . $zoom . ",
                  center: myLatlng,
                  mapTypeId: " . $maptype . "
                };
                map = new google.maps.Map(document.getElementById('map-canvas'),
                    mapOptions);

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Thông tin liên hệ'
                });
                google.maps.event.addListener(map, 'click', function(event) {
                  addMarker(event.latLng);
                });
                google.maps.event.addListener(map, 'zoom_changed', function(event) {
                  var zoomLevel = map.getZoom();

                });
              }

            function addMarker(location) {
                deleteMarkers();
                var marker = new google.maps.Marker({
                  position: location,
                  map: map
                });
                markers.push(marker);
                var lat=location.lat();
                var lng=location.lng();



              }
           function setAllMap(map) {
                for (var i = 0; i < markers.length; i++) {
                  markers[i].setMap(map);
                }
              }

              // Removes the markers from the map, but keeps them in the array.
              function clearMarkers() {
                setAllMap(null);
              }

              // Shows any markers currently in the array.
              function showMarkers() {
                setAllMap(map);
              }

           function deleteMarkers() {
            clearMarkers();
            markers = [];
          }

          google.maps.event.addDomListener(window, 'load', initialize);
        </script>";

    echo $strScript;
?>

<div class="main">
    <div class="col-main">
        <div class="box">
            <?php if ($contact): ?>
                <h3 class="title-main"><span class="label">Liên hệ &raquo</span></h3>
                <div class="box-info">
                    <h3 class="title" style="color: #000000"><?php echo htmlspecialchars($contact->getTitle());?></h3>
                    <div style="margin-top: 10px; margin-left: 25px; line-height: 20px;">
                        <?php echo nl2br(htmlspecialchars($contact->getContent())); ?>
                    </div>
                </div>

                <div class="box-map">
                    <h3 class="title-item">Sơ đồ đường đi</h3>
                    <div class="map">
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
                    <div class="frm-item">
                        <span class="label"></span>
                        <span class="btn-in">
                            <?php if ($sf_user->hasFlash('success')): ?>
                                <span><?php echo __($sf_user->getFlash('success'), null, 'tmcTwitterBootstrapPlugin') ?></span>
                            <?php endif; ?>
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

