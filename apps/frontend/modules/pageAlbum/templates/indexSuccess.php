<div class="page">
    <?php include_component('pageAlbum', 'albumTop') ?>

    <?php include_component('pageAlbum', 'pageContent') ?>
</div>

<script>
    $(document).ready(function() {
        $("#content-slider").lightSlider({
            loop:true,
            keyPress:true
        });
        $('#image-gallery').lightSlider({
            gallery:true,
            item:1,
            thumbItem:7,
            slideMargin: 0,
            speed:700,
            auto:true,
            loop:true,
            rtl:false,
            adaptiveHeight:false,

            vertical:false,
            verticalHeight:2000,
            vThumbWidth:100,

            pager: true,
            galleryMargin: 12,
            thumbMargin: 15,
            currentPagerPosition: 'middle',

            enableTouch:true,
            enableDrag:true,
            freeMove:true,
            swipeThreshold: 40,

            responsive : [],
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });
</script>