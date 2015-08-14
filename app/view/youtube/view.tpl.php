<?php if (isset($videos) && is_object($videos)): ?>
    
    <?php $properties = $videos->getProperties(); ?>
<h1><?=$properties['title']?></h1>
   <?= '<iframe width="610px" height="390" src="http://www.youtube.com/embed/'.$properties['ytid'].'?wmode=transparent&rel=0&controls=0&modestbranding=1&showinfo=0&autoplay=1" frameborder="0" ></iframe>'?>
<p><?=$properties['description']?></p>
<p><a href='<?=$this->url->create('youtube/videos')?>'><i class="fa fa-arrow-left"></i> Back</a></p>

<?php endif; ?> 