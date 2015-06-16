<?php if(isset($listCat) && $listCat): ?>
<div class="box-mod category">
    <h3 class="title"><span class="label">Về chúng tôi &raquo;</span></h3>
    <ul>
        <?php foreach($listCat as $cat):
            if ($cat->getLink() != '') {
                if (VtHelper::startsWith($cat->getLink(), '@')) {
                    $link = url_for($cat->getLink());
                } else {
                    $link = $cat->getLink();
                }
            }
            else{
                $link = '';
            }
        ?>
        <li>
            <a href="<?php echo htmlspecialchars($link); ?>" title=""><?php echo htmlspecialchars($cat->getName()); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>