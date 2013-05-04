<?php $options->setDefault('single', true) ?>
<?php $options->setDefault('name_method', 'getNameAndCount') ?>

<div class="well" style="margin-bottom:0px; font-size:17px;">
    <ul class="thumbnails">
        <li>
            <a href="#" class="thumbnail">
                <?php $imgParam = array('size' => '400x300', 'alt' => $options->object->getName()) ?>
                <?php $nameMethod = $options->name_method ?>
                <?php if ($options->object): ?>
                    <?php echo op_image_tag_sf_image($options->object->getImageFileName(), $imgParam) ?>
                <?php else: ?>
                    <?php echo op_image_tag('no_image.gif', $imgParam) ?>
                <?php endif; ?>
            </a>
        </li>
    </ul>
    <?php echo $options->object->$nameMethod() ?>
</div>








