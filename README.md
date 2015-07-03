Simple-Youtube-Embed-Manager
====================
Easy way to embed youtube videos in your site. All you have to do is just insert youtube video id with video title and description and voilà! video will be up on your site.


Installation Instructions
=========================
Notice:
You need to have CForm and CDatabase installed in order to use this module.
- First you need to have a copy of [Anax-MVC][1].
- Drag and drop the files to your Anax-copy.
- Make new frontcontroller in webroot folder and insert the lines: 

```php
$di->set('YoutubeController', function() use ($di) {
    $controller = new \Ishaq\Youtube\YoutubeController();
    $controller->setDI($di);
    return $controller;
});

// Get theme
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_youtube.php');

// Routes
$app->router->add('', function() use ($app) {

    $app->theme->setTitle("Youtube");

    $app->views->add('youtube/page', [
        'content' => "<h1 style='border: 0;'>Welcome to the Youtube Videos database!</h1>",
    ]);

});

$app->router->add('setup', function() use ($app) {

    $app->theme->setTitle("Setup Videos");
 
    $app->db->dropTableIfExists('youtube')->execute();
 
    $app->db->createTable(
        'youtube',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'title' => ['varchar(80)','not null'],
            'ytid' => ['varchar(80)','not null'],
            'description' => ['varchar(255)','not null'],
            'created' => ['datetime'],
        ]
    )->execute();


    // insert Two test videos
    $app->db->insert(
        'youtube',
        ['title', 'ytid', 'description','created']
    );
    
    $now = date("Y-m-d h:i:s");
 
    $app->db->execute([
        'Zlatan Ibrahimovic - Craziest Skills Ever - Impossible Goals',
        'ln35qLphK4I',
        'Music : What So Not - Touched _Slumberjack Edit',
        $now
    ]);
 
    $app->db->execute([
        'Avicii - The Nights',
        'UtF6Jej8yb4',
        'The Nights" is a song by Swedish DJ and music producer Avicii.',
        $now
    ]);
    $app->db->execute([
        'Shakira - Waka Waka',
        'pRpeEdMmmQ0',
        '"Waka Waka (This Time for Africa)" (Spanish: "Waka Waka (Esto es África)") is a song by Colombian singer-songwriter Shakira featuring South African band Freshlyground',
        $now
    ]);

    $url = $app->url->create('youtube/videos');

    $app->response->redirect($url);
});

```
That's it! you can access youtube module on www.yoursite.com/webroot/yourfrontcontroller.php

DEMO
=========================

http://www.student.bth.se/~isjc13/phpmvc/kmom05/webroot/youtube.php/youtube/videos
[1]:https://github.com/mosbth/Anax-MVC
