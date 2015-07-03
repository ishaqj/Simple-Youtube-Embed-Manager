<h1><?=$title?></h1>
<?= isset($search) ? $search : '' ?>
<?php if(!empty($videos)) : ?>

    <table class='table'>
        <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Added</th>
            <th colspan='5'>Options</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($videos as $video) : ?>

            <?php $properties = $video->getProperties(); ?>
            <tr>
                <?php $url = $this->url->create('youtube/id/' . $properties['id']) ?>
                <td><a href="<?=$url?>"><?= '<img src= "https://i.ytimg.com/vi/'.$video->ytid.'/mqdefault.jpg" width="196" height="110">'?></a></td>
                <td><?=$properties['title']?></td>
                <td><?= isset($properties['created']) ? $properties['created'] : '-' ?></td>

                <?php $url = $this->url->create('youtube/id/' . $properties['id']) ?>
                 <td><a href="<?=$url?>" title="Play"> <i class="fa fa-youtube-play"></i> </a></td>

                <?php $url = $this->url->create('youtube/update/' . $properties['id']) ?>
                <td><a href="<?=$url?>" title="Edit"> <i class="fa fa-pencil-square-o"></i> </a></td>

                <?php $url = $this->url->create('youtube/delete/' . $properties['id']) ?>
                <td><a href="<?=$url?>" title="Remove"> <i class="fa fa-times"></i> </a></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
    </table>

<?php else : ?>

 <p>No videos Found </p>
 <p><a href='<?=$this->url->create('youtube/videos')?>'><i class="fa fa-arrow-left"></i> Back</a></p>

<?php endif; ?>