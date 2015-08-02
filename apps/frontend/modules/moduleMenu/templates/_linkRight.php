<?php
if (isset($links) && $links):
    ?>
    <div class="box-mod category">
        <h3 class="title"><span class="label"><?php echo __('Liên kết'); ?> &raquo;</span>
        </h3>
        <select id="link-right">
            <option value="">------------------Chọn liên kết-------------------</option>
            <?php foreach($links as $link): ?>
                <option onclick="clickLink('<?php echo $link['link'] ?>')" value="<?php echo $link['id'] ?>"><?php echo $link['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php
endif;
?>
<script type="text/javascript">
    function clickLink(link){
        window.open(link, '_blank');
    }
</script>