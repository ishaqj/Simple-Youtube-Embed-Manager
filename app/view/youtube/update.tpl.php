<h1><?=$title?></h1>


<?php if (isset($youtube) && is_object($youtube)): ?>

        <?php $properties = $youtube->getProperties(); ?>
        <p> <?=$content?> </p>
        

<?php else : ?>

    <p> no video found </p>

<?php endif; ?>
 
<p><a href='<?=$this->url->create('users/update')?>'><i class="fa fa-arrow-left"></i> Back</a></p>