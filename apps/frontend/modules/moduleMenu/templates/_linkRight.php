<?php
if (isset($links) && $links):
    ?>
    <div class="box-mod category">
        <h3 class="title"><span class="label"><?php echo __('Liên kết'); ?> &raquo;</span>
        </h3>
        <select id="link-right" onchange="historyChanged(this);>
            <option value="">------------------Chọn liên kết-------------------</option>
            <?php foreach($links as $link): ?>
                <option value="<?php echo $link['link'] ?>"><?php echo $link['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php
endif;
?>
<script type="text/javascript">
    function historyChanged() {
        var historySelectList = $('select#link-right');
        var selectedValue = $('option:selected', historySelectList).val();
        window.open(selectedValue , '_blank');
    }

    $(function() {
        $('select#link-right').change(historyChanged);
    });
</script>