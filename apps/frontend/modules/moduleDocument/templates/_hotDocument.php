<?php
if (isset($categoriesDoc) && $categoriesDoc):
    foreach ($categoriesDoc as $cat):
        $listDocument = $cat->getDocumentByCatId();
        if (count($listDocument)):
            ?>
            <div class="box-mod category">
                <h3 class="title"><span class="label"><?php echo htmlspecialchars($cat->getName()); ?> &raquo;</span>
                </h3>
                <ul>
                    <?php
                        foreach($listDocument as $doc):
                            if($doc['file_path']){
                                $newLink = '/uploads/' . sfConfig::get('app_document') . '/' . $doc['file_path'];
                            }
                    ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($newLink); ?>" title="<?php echo htmlspecialchars($doc['name']); ?>" target="_blank"><?php echo htmlspecialchars($doc['name']); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php
        endif;
    endforeach;
endif;
?>