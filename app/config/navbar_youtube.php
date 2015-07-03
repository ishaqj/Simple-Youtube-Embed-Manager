<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => '<i class="fa fa-arrow-left"></i> Back',
            'url'   => '../index.php',
            'title' => 'Back'
        ],

        // This is a menu item
        'videos' => [
            'text'  =>'Videos',
            'url'   =>'youtube/videos',
            'title' => 'List'
        ],


        // This is a menu item
        'add' => [
            'text'  =>'Add',
            'url'   =>'youtube/add',
            'title' => 'Add'
        ],


        // This is a menu item
        'setup' => [
            'text'  =>'Setup',
            'url'   =>'setup',
            'title' => 'Setup'
        ],
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function($url) {
        if ($url == $this->di->get('request')->getRoute()) {
            return true;
        }
    },

    // Callback to create the urls
    'create_url' => function($url) {
        return $this->di->get('url')->create($url);
    },
];
